<?php

namespace ArchSendMailLaravel\Mailer\Infos;

class Remetente
{
    public function __construct(
        public ?string $email = null,
        public ?string $password = null,
        public ?string $host = null,
        public ?string $port = null,
        public ?string $nome = null,
    ) {
        $this->email = $email ?? config('app.smtp_username');
        $this->password = $password ?? config('app.smtp_password');
        $this->host = $host ?? config('app.smtp_host');
        $this->port = $port ?? config('app.smtp_host_port');
    }
}
