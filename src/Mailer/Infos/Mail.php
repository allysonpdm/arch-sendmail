<?php

namespace ArchSendMailLaravel\Mailer\Infos;

use ArchSendMailLaravel\Mailer\Infos\Destinatario;
use ArchSendMailLaravel\Mailer\Infos\Remetente;

class Mail implements MailInterface
{
    public Destinatario $destinatario;
    public Remetente $remetente;
    public string $assunto;
    public ?string $msgHtml;
    public ?string $msgText;
    public ?string $configurationSet;
    public ?int $SMTPDebug;
    public array $attachments;
    public array $stringAttachments;

    public function __construct(
        Destinatario $destinatario,
        Remetente $remetente,
        string $assunto,
        ?string $msgHtml = null,
        ?string $msgText = null,
        ?string $configurationSet = null,
        ?int $SMTPDebug = null,
        array $attachments = [],
        array $stringAttachments = [],
    ) {
        $this->destinatario = $destinatario;
        $this->remetente = $remetente;
        $this->assunto = utf8_decode($assunto);
        $this->msgHtml = utf8_decode($msgHtml);
        $this->msgText = utf8_decode($msgText);
        $this->configurationSet = $configurationSet;
        $this->SMTPDebug = $SMTPDebug;
        $this->attachments = $attachments;
        $this->attachments = $stringAttachments;
    }
}
