<?php

namespace ArchSendMailLaravel\Mailer\Infos;

use ArchCrudLaravel\App\ObjectValues\Email;

class Destinatario
{
    public function __construct(
        public Email $email,
        public ?string $nome = null,
    ) {
        // Code here...
    }
}
