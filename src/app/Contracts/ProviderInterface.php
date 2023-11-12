<?php

namespace ArchSendMailLaravel\App\Contracts;

use ArchSendMailLaravel\App\Dtos\Mail;

interface ProviderInterface
{
    public function api(Mail $mail): bool;
    public function sdk(Mail $mail): bool;
    public function smtp(Mail $mail): bool;
}
