<?php

namespace ArchSendMail\App\Traits;

use ArchSendMail\App\Dtos\{
    Mail,
    SmtpConfigs
};
use Exception;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use PHPMailer\PHPMailer\{
    PHPMailer,
    Exception as PHPMailerException,
    SMTP
};

trait HasSmtp
{
    protected Mail $mail;
    protected SmtpConfigs $smtpConfig;
    protected PHPMailer $mailer;
    protected string $charSet = 'UTF-8';
    protected string $language = 'pt_BR';
    protected int $debugMode = SMTP::DEBUG_OFF;

    public function setSmtpConfigs(SmtpConfigs $smtpConfig): self
    {
        $this->smtpConfig = $smtpConfig;
        return $this;
    }

    public function charSet(string $charSet): self
    {
        $this->charSet = $charSet;
        return $this;
    }

    public function setLanguage(string $language): self
    {
        $this->language = $language;
        return $this;
    }

    public function setDebugMode(int $debugMode): self
    {
        $this->debugMode = $debugMode;
        return $this;
    }

    public function smtp(Mail $mail): bool
    {
        try {
            $this->mail = $mail;
            $mailer = $this->prepareMailerSmtp();
            return $mailer->Send();
        } catch (Exception $exception) {
            $logger = new Logger('PHPMailer');
            $logger->pushHandler(new StreamHandler('PHPMailer.log', Logger::INFO));
            $logger->warning('PHPMailer erro: ' . $exception->getMessage());
            return false;
        }
    }

    protected function prepareMailerSmtp(): PHPMailer
    {
        return $this->bootUp()
            ->setSender()
            ->setRecipients()
            ->setMessage()
            ->mailer;
    }

    protected function bootUp(): self
    {
        $this->mailer = new PHPMailer(true);

        // Specify the SMTP settings.
        $this->mailer->isSMTP();
        $this->mailer->Username = $this->smtpConfig->credential->user;
        $this->mailer->Password = $this->smtpConfig->credential->pass;
        $this->mailer->Host = $this->smtpConfig->host;
        $this->mailer->Port = $this->smtpConfig->port;
        $this->mailer->SMTPAuth = $this->smtpConfig->auth;
        $this->mailer->SMTPSecure = $this->smtpConfig->secure;
        $this->mailer->SMTPDebug = $this->debugMode;
        $this->mailer->CharSet = $this->charSet;
        $this->mailer->setLanguage($this->language);
        return $this;
    }

    protected function setSender()
    {
        $this->mailer
            ->setFrom(
                address: $this->mail->remetente->email,
                name: $this->mail->remetente->nome
            );
        return $this;
    }

    protected function setRecipients()
    {
        $this->mailer
            ->addAddress(address: $this->mail->destinatario->email);
        return $this;
    }

    protected function setMessage()
    {
        // Specify the content of the message.
        $this->mailer->isHTML(true);
        $this->mailer->Subject = $this->mail->assunto;
        $this->mailer->Body = $this->mail->msgHtml;
        $this->mailer->AltBody = $this->mail->msgText;

        $this->addAttachment(attachments: $this->mail->attachments ?? []);
        $this->addStringAttachment(attachments: $this->mail->stringAttachments ?? []);
        return $this;
    }

    protected function addAttachment(array $attachments): void
    {
        foreach ($attachments as $attachment){
            $this->mailer
                ->AddAttachment(
                    path: $attachment->file,
                    name: basename($attachment->file)
                );
        }
    }

    protected function addStringAttachment(array $attachments): void
    {
        foreach ($attachments as $attachment){
            $this->mailer
                ->AddStringAttachment(
                    $attachment->string,
                    $attachment->filename,
                    $attachment->encodingBase ?? 'base64',
                    $attachment->mimeType ?? null
                );
        }
    }
}
