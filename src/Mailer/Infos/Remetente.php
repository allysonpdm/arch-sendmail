<?php

namespace Allyson\Mailer\Infos;

class Remetente {
    public ?string $email;
    public ?string $password;
    public ?string $host;
    public ?string $port;
    public ?string $nome;

    public function __construct(
        ?string $email = null,
        ?string $password = null,
        ?string $host = null,
        ?string $port = null,
        ?string $nome = null,
    ) {
        $this->email = $email ?? config('app.smtp_username');
        $this->password = $password ?? config('app.smtp_password');
        $this->host = $host ?? config('app.smtp_host');
        $this->port = $port ?? config('app.smtp_host_port');
        $this->nome = $nome;
    }
}
