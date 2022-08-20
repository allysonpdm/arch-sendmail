<?php

namespace ArchLaravelSendMail\Providers\SendGrid;

use ArchLaravelSendMail\Mailer\Infos\Mail;
use ArchLaravelSendMail\Providers\BaseProvider;

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
