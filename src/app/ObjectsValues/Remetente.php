<?php

namespace ArchSendMailLaravel\Mailer\Infos;

use PhpObjectValues\App\ObjectValues\Email;

class Remetente
{
    public function __construct(
        public ?Email $email = null,
        public ?string $nome = null,
    ) {
    }
}
