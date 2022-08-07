<?php

namespace Allyson\Providers;

use Allyson\Mailer\Infos\Mail;

interface ProviderInterface
{
    public function api(Mail $mail): bool;
    public function sdk(Mail $mail): bool;
    public function smtp(Mail $mail): bool;
}
