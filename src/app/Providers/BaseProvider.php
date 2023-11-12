<?php

namespace ArchSendMailLaravel\Providers;

use ArchSendMailLaravel\App\Contracts\{
    ProviderInterface,
    SmtpTraitRequirement
};
use ArchSendMailLaravel\App\Dtos\Mail;
use ArchSendMailLaravel\App\Traits\HasSmtp;

abstract class BaseProvider implements ProviderInterface, SmtpTraitRequirement
{
    protected Mail $mail;

    use HasSmtp;

    abstract public function api(Mail $mail): bool;
    abstract public function sdk(Mail $mail): bool;
}
