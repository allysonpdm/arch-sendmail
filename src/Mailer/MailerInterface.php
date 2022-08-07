<?php

namespace Allyson\Mailer;

use Allyson\Mailer\Infos\MailInterface;
use Allyson\Providers\ProviderInterface;

interface MailerInterface
{
    public function __construct(ProviderInterface $sendMailAdapter, MailInterface $dataForMail);
    public function api(): bool;
    public function smtp(): bool;
    public function sdk(): bool;
}
