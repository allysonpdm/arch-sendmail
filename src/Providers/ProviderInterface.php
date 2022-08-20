<?php

namespace ArchLaravelSendMail\Providers;

use ArchLaravelSendMail\Mailer\Infos\Mail;

interface ProviderInterface
{
    public function api(Mail $mail): bool;
    public function sdk(Mail $mail): bool;
    public function smtp(Mail $mail): bool;
}
