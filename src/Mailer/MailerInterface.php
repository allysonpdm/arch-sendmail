<?php

namespace Allyson\Mailer;

use Allyson\Providers\ProviderInterface;

interface MailerInterface
{
    public function __construct(ProviderInterface $sendMailAdapter, object $dataForMail);
    public function api(): bool;
    public function smtp(): bool;
    public function sdk(): bool;
}