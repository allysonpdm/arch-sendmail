<?php

namespace ArchSendMailLaravel\Providers\SendGrid;

use ArchSendMailLaravel\Mailer\Infos\Mail;
use ArchSendMailLaravel\Providers\BaseProvider;

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
