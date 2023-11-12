<?php

namespace ArchSendMailLaravel\Mailer\Infos;

use ArchCrudLaravel\App\ObjectValues\Email;

class Remetente
{
    public function __construct(
        public ?Email $email = null,
        public ?string $nome = null,
    ) {
    }
}
