<?php

namespace ArchSendMailLaravel\Providers;

use ArchSendMailLaravel\Mailer\Infos\Mail;

interface ProviderInterface
{
    public function api(Mail $mail): bool;
    public function sdk(Mail $mail): bool;
    public function smtp(Mail $mail): bool;
}
