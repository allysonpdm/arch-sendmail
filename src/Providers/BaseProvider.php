<?php

namespace ArchSendMailLaravel\Providers;

use ArchSendMailLaravel\Mailer\Infos\Mail;
use ArchSendMailLaravel\Mailer\Infos\Destinatario;
use ArchSendMailLaravel\Mailer\Infos\Remetente;
use Exception as GlobalException;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use stdClass;

abstract class BaseProvider implements ProviderInterface
{
    protected $mail;
    public Remetente $remetente;
    public Destinatario $destinatario;
    public string $assunto;
    public ?string $msgHtml;
    public ?string $msgText;
    public array $attachments;
    public array $stringAttachments;
    public ?string $configurationSet;
    public ?int $SMTPDebug;

    public function smtp(Mail $mail): bool
    {
        try {
            $this->mountEmail($mail)
                ->Send($mail);
            return true;
            //echo "Email sent!", PHP_EOL;
        } catch (phpmailerException $e) {

            //TODO: Notificar a falha ao admin
            //TODO: Adicionar a uma fila para reenviar o email

            //echo "An error occurred. {$e->errorMessage()}", PHP_EOL; // Catch errors from PHPMailer.
        } catch (Exception $e) {
            //echo "Email not sent. {$this->mail->ErrorInfo}", PHP_EOL; // Catch errors from Amazon SES.
        }
        return false;
    }

    protected function mountEmail(Mail $mail)
    {
        return $this->setConfig($mail)
            ->setSender($mail)
            ->setRecipients($mail)
            ->setMessage($mail)
            ->mail;
    }

    protected function setConfig(Mail $mail)
    {
        $this->mail = new PHPMailer(true);

        // Specify the SMTP settings.
        $this->mail->isSMTP();
        $this->mail->Username   = $mail->remetente->email;
        $this->mail->Password   = $mail->remetente->password;
        $this->mail->Host       = $mail->remetente->host;
        $this->mail->Port       = $mail->remetente->port;
        $this->mail->SMTPAuth   = true;
        $this->mail->SMTPSecure = 'tls';
        $this->mail->SMTPDebug = $mail->SMTPDebug;
        $this->mail->addCustomHeader('X-SES-CONFIGURATION-SET', $mail->configurationSet);
        $this->mail->CharSet = 'UTF-8';
        $this->mail->setLanguage('pt_BR');
        return $this;
    }

    protected function setSender(Mail $mail)
    {
        $this->mail->setFrom($mail->remetente->email, $mail->remetente->nome);
        return $this;
    }

    protected function setRecipients(Mail $mail)
    {
        $this->mail->addAddress($mail->destinatario->email);
        return $this;
    }

    protected function setMessage(Mail $mail)
    {
        // Specify the content of the message.
        $this->mail->isHTML(true);
        $this->mail->Subject    = $mail->assunto;
        $this->mail->Body       = $mail->msgHtml;
        $this->mail->AltBody    = $mail->msgText;
        
        $this->addAttachment($mail->attachments ?? []);
        $this->addStringAttachment($mail->stringAttachments ?? []);
        return $this;
    }

    protected function addAttachment(array $attachments): void
    {
        foreach ($attachments as $attachment){
            $this->mail->AddAttachment($attachment->file, basename($attachment->file));
        }
    }

    protected function addStringAttachment(array $attachments): void
    {
        foreach ($attachments as $attachment){
            $this->mail->AddStringAttachment($attachment->string, $attachment->filename, $attachment->encodingBase ?? 'base64', $attachment->mimeType ?? null);
        }
    }

    abstract public function api(Mail $mail): bool;
    abstract public function sdk(Mail $mail): bool;
}
