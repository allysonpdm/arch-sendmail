<?php

namespace ArchSendMailLaravel\Dtos;

class Credential extends Data
{
    public function __construct(
        public string $user,
        public ?string $pass = null,
    ) {
        // Code here...
    }
}
