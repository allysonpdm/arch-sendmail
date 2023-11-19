<?php

namespace ArchSendMail\App\ObjectsValues;

use PhpObjectValues\App\ObjectValues\Email;

class Remetente
{
    public function __construct(
        public Email|string|null $email = null,
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
