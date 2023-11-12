<?php

namespace ArchSendMailLaravel\Mailer;

use ArchSendMailLaravel\App\Dtos\Mail;
use ArchSendMailLaravel\App\Contracts\{
    MailerInterface,
    ProviderInterface
};

abstract class Mailer implements MailerInterface
{
    public function __construct(
        protected ProviderInterface $provider
    )
    {
        // Code here
    }

    public function api(Mail $mail): bool
    {
        return $this->provider->api($mail);
    }

    public function smtp(Mail $mail): bool
    {
        return $this->provider->smtp($mail);
    }

    public function sdk(Mail $mail): bool
    {
        return $this->provider->sdk($mail);
    }
}
