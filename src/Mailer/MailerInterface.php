<?php

namespace ArchLaravelSendMail\Mailer;

use ArchLaravelSendMail\Mailer\Infos\MailInterface;
use ArchLaravelSendMail\Providers\ProviderInterface;

interface MailerInterface
{
    public function __construct(ProviderInterface $sendMailAdapter, MailInterface $dataForMail);
    public function api(): bool;
    public function smtp(): bool;
    public function sdk(): bool;
}
