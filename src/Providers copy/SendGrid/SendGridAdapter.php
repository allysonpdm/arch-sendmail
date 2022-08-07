<?php

namespace Allyson\Providers\SendGrid;

use Allyson\Mailer\Infos\Mail;
use Allyson\Providers\BaseProvider;

class SendGridAdapter extends BaseProvider
{
    public function api(Mail $mail): bool
    {
        return false;
    }

    public function sdk(Mail $mail): bool
    {
        return false;
    }
}
