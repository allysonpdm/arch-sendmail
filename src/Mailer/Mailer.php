<?php

namespace ArchSendMailLaravel\Mailer;

use ArchSendMailLaravel\Mailer\Infos\MailInterface;
use ArchSendMailLaravel\Providers\ProviderInterface;

abstract class Mailer implements MailerInterface
{
    public function __construct(
        protected ProviderInterface $provider,
        protected MailInterface $mail
    )
    {
        // Code here
    }

    public function api(): bool
    {
        return $this->provider->api($this->mail);
    }

    public function smtp(): bool
    {
        return $this->provider->smtp($this->mail);
    }

    public function sdk(): bool
    {
        return $this->provider->sdk($this->mail);
    }
}
