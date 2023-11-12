<?php

namespace ArchSendMail\Providers;

use ArchSendMail\App\Contracts\{
    ProviderInterface,
    SmtpTraitRequirement
};
use ArchSendMail\App\Dtos\Mail;
use ArchSendMail\App\Traits\HasSmtp;

abstract class BaseProvider implements ProviderInterface, SmtpTraitRequirement
{
    protected Mail $mail;

    use HasSmtp;

    abstract public function api(Mail $mail): bool;
    abstract public function sdk(Mail $mail): bool;
}
