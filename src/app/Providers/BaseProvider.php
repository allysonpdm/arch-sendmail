<?php

namespace ArchSendMailLaravel\Providers;

use ArchSendMailLaravel\App\Contracts\ProviderInterface;
use ArchSendMailLaravel\App\Dtos\Mail;
use ArchSendMailLaravel\App\Traits\HasSmtp;

abstract class BaseProvider implements ProviderInterface
{
    protected Mail $mail;

    use HasSmtp;

    abstract public function api(Mail $mail): bool;
    abstract public function sdk(Mail $mail): bool;
}
