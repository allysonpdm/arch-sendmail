<?php

namespace ArchSendMailLaravel\Mailer\Infos;

interface MailInterface
{
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
    );
}
