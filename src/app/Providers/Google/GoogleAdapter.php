<?php

namespace ArchSendMail\Providers\Google;

use ArchSendMail\App\Dtos\Mail;
use ArchSendMail\Providers\BaseProvider;

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
