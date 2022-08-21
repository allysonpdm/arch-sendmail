<?php

namespace ArchSendMailLaravel\Mailer;

use ArchSendMailLaravel\Mailer\Infos\MailInterface;
use ArchSendMailLaravel\Providers\ProviderInterface;

interface MailerInterface
{
    public function __construct(
        ProviderInterface $providerAdapter,
        MailInterface $dataTransferObjectMail
    );
    public function api(): bool;
    public function smtp(): bool;
    public function sdk(): bool;
}
