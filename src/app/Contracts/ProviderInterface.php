<?php

namespace ArchSendMail\App\Contracts;

use ArchSendMail\App\Dtos\Mail;

interface ProviderInterface
{
    public function api(Mail $mail): bool;
    public function sdk(Mail $mail): bool;
    public function smtp(Mail $mail): bool;
}
