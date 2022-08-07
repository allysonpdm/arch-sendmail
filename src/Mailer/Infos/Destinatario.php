<?php

namespace Allyson\Mailer\Infos;

class Destinatario {
    public string $email;
    public ?string $nome;

    public function __construct(
        string $email,
        ?string $nome,
    ) {
        $this->email = $email;
        $this->nome = $nome;
    }
}
