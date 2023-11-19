<?php

namespace ArchSendMail\App\ObjectsValues;

use PhpObjectValues\App\ObjectValues\Email;

class Destinatario
{
    public function __construct(
        public Email|string $email,
        public ?string $nome = null,
    ) {
        if(
            !empty($email) &&
            !($email instanceof Email)
        ){
            $this->email = new Email($email);
        }
    }
}
