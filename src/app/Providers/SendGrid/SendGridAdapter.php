<?php

namespace ArchSendMail\Providers\SendGrid;

use ArchSendMail\App\Dtos\Mail;
use ArchSendMail\Providers\BaseProvider;

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
