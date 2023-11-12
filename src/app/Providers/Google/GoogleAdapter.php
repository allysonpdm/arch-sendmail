<?php

namespace ArchSendMailLaravel\Providers\Google;

use ArchSendMailLaravel\App\Dtos\Mail;
use ArchSendMailLaravel\Providers\BaseProvider;

class GoogleAdapter extends BaseProvider
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
