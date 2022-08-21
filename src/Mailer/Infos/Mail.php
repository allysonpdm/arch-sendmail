<?php

namespace ArchSendMailLaravel\Mailer\Infos;

use ArchSendMailLaravel\Mailer\Infos\Destinatario;
use ArchSendMailLaravel\Mailer\Infos\Remetente;

class Mail implements MailInterface
{
    public function __construct(
        public Destinatario $destinatario,
        public Remetente $remetente,
        public string $assunto,
        public ?string $msgHtml = null,
        public ?string $msgText = null,
        public ?string $configurationSet = null,
        public ?int $SMTPDebug = null,
        public array $attachments = [],
        public array $stringAttachments = [],
    ) {
        // Code here...
    }
}
