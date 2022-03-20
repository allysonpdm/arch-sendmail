<?php

namespace Allyson\Providers;

use Exception as GlobalException;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use stdClass;

abstract class BaseProvider implements ProviderInterface
{
    protected $usernameSmtp;
    protected $passwordSmtp;
    protected $host;
    protected $port = 587;
    protected $mail;

    public $remetente;
    public $destinatario;
    public $assunto;
    public $msgHtml;
    public $msgText;
    public $attachments;
    public $stringAttachments;
    public $configurationSet;
    public $SMTPDebug;

    public function __construct()
    {
        $this->usernameSmtp = config('app.username_smtp');
        $this->passwordSmtp = config('app.password_smtp');
        $this->host = config('app.host_smtp');
        $this->port = config('app.host_port') ?? 587;
    }

    public function smtp(object $dataForMail): bool
    {
        try {
            $this->getProps($dataForMail)
                ->mountEmail()
                ->Send();
            return true;
            echo "Email sent!", PHP_EOL;
        } catch (phpmailerException $e) {
            echo "An error occurred. {$e->errorMessage()}", PHP_EOL; // Catch errors from PHPMailer.
        } catch (Exception $e) {
            echo "Email not sent. {$this->mail->ErrorInfo}", PHP_EOL; // Catch errors from Amazon SES.
        }
        return false;
    }

    protected function getProps($dataForMail)
    {
        $this->remetente = new stdClass;
        $this->remetente->nome = $dataForMail->remetente->nome ?? null;
        $this->remetente->endereco = self::required($dataForMail->remetente->endereco, 'endereço do remetente');
        $this->destinatario = self::required($dataForMail->destinatario, 'endereço do destinatário');
        $this->assunto = self::required($dataForMail->assunto, 'assunto');
        $this->msgHtml = $dataForMail->msgHtml ?? null;
        $this->msgText = $dataForMail->msgText ?? null;
        $this->configurationSet = $dataForMail->configurationSet ?? null;
        $this->SMTPDebug = $dataForMail->SMTPDebug ?? null;
        $this->stringAttachments = $dataForMail->stringAttachments ?? [];
        $this->attachments = $dataForMail->attachments ?? [];

        return $this;
    }

    protected static function required($entry, $name)
    {
        if (empty($entry))
            throw new GlobalException("O parâmetro $name deve ser informado.");

        return $entry;
    }

    protected function mountEmail()
    {
        return $this->setConfig()
            ->setSender()
            ->setRecipients()
            ->setMessage()
            ->mail;
    }

    protected function setConfig()
    {
        $this->mail = new PHPMailer(true);

        // Specify the SMTP settings.
        $this->mail->isSMTP();
        $this->mail->Username   = $this->usernameSmtp;
        $this->mail->Password   = $this->passwordSmtp;
        $this->mail->Host       = $this->host;
        $this->mail->Port       = $this->port;
        $this->mail->SMTPAuth   = true;
        $this->mail->SMTPSecure = 'tls';
        $this->mail->SMTPDebug = $this->SMTPDebug;
        $this->mail->addCustomHeader('X-SES-CONFIGURATION-SET', $this->configurationSet);
        return $this;
    }

    protected function setSender()
    {
        $this->mail->setFrom($this->remetente->endereco, $this->remetente->nome);
        return $this;
    }

    protected function setRecipients()
    {
        $this->mail->addAddress($this->destinatario);
        return $this;
    }

    protected function setMessage()
    {
        // Specify the content of the message.
        $this->mail->isHTML(true);
        $this->mail->Subject    = $this->assunto;
        $this->mail->Body       = $this->msgHtml;
        $this->mail->AltBody    = $this->msgText;
        $this->addAttachment($this->attachments);
        $this->addStringAttachment($this->stringAttachments);
        return $this;
    }

    protected function addAttachment($attachments)
    {
        foreach ($attachments as $attachment)
            $this->mail->AddAttachment($attachment->file, basename($attachment->file));
    }

    protected function addStringAttachment($attachments)
    {
        foreach ($attachments as $attachment)
            $this->mail->AddStringAttachment($attachment->string, $attachment->filename, $attachment->encodingBase ?? 'base64', $attachment->mimeType ?? null);
    }

    public function api(object $dataForMail): bool
    {
        return false; // TODO: implementar futuramente
    }

    public function sdk(object $dataForMail): bool
    {
        return false; // TODO: implementar futuramente
    }
}