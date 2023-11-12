<?php

namespace ArchSendMailLaravel\Mailer\Infos;

class Destinatario
{
    public function __construct(
        public string $email,
        public ?string $nome = null,
    ) {
        // Code here...
    }
}
