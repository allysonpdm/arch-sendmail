<?php

namespace ArchLaravelSendMail\Mailer;

use ArchLaravelSendMail\Mailer\Infos\MailInterface;
use ArchLaravelSendMail\Providers\ProviderInterface;

abstract class Mailer implements MailerInterface
{
    protected ProviderInterface $mailer;
    protected object $mail;

    public function __construct(ProviderInterface $mailer, MailInterface $mail)
    {
        $this->mailer = $mailer;
        $this->mail = $mail;
    }

    public function api(): bool
    {
        return $this->mailer->api($this->mail);
    }

    public function smtp(): bool
    {
        return $this->mailer->smtp($this->mail);
    }

    public function sdk(): bool
    {
        return $this->mailer->sdk($this->mail);
    }
}
