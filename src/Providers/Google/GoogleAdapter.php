<?php

namespace Allyson\Providers\Google;

use Allyson\Providers\BaseProvider;
use PHPMailer\PHPMailer\PHPMailer;
use stdClass;

class GoogleAdapter extends BaseProvider
{
    public function __construct()
    {
        $this->usernameSmtp = config('app.username_smtp');
        $this->passwordSmtp = config('app.password_smtp');
        $this->host = config('app.host') ?? 'smtp.gmail.com';
    }

    protected function getProps($mail)
    {
        $this->remetente = new stdClass;
        $this->remetente->nome = $mail->remetente->nome ?? null;
        $this->remetente->endereco = self::required($this->usernameSmtp, 'endereço do remetente');
        $this->destinatario = self::required($mail->destinatario, 'endereço do destinatário');
        $this->assunto = self::required($mail->assunto, 'assunto');
        $this->msgHtml = $mail->msgHtml ?? null;
        $this->msgText = $mail->msgText ?? null;
        $this->stringAttachments = $mail->stringAttachments ?? [];
        $this->attachments = $mail->attachments ?? [];
        $this->SMTPDebug = $mail->SMTPDebug ?? null;

        return $this;
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
        return $this;
    }

    public function api(object $mail): bool
    {
        return false;
    }

    public function sdk(object $mail): bool
    {
        return false;
    }

}