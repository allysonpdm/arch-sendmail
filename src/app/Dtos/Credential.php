<?php

namespace ArchSendMail\App\Dtos;

use Spatie\LaravelData\Data;

class Credential extends Data
{
    public function __construct(
        public string $user,
        public ?string $pass = null,
    ) {
        // Code here...
    }
}
