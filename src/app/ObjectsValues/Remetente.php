<?php

namespace ArchSendMail\App\ObjectsValues;

use PhpObjectValues\App\ObjectValues\Email;

class Remetente
{
    public function __construct(
        public ?Email $email = null,
        public ?string $nome = null,
    ) {
    }
}
