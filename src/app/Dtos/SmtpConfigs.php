<?php

namespace ArchSendMailLaravel\Dtos;

class SmtpConfigs extends Data
{
    public function __construct(
        public Credential $credential,
        public string $host,
        public int $port = 587,
        public bool $auth = true,
        public string $secure = 'tls'
    ) {
        // Code here...
    }
}
