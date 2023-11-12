<?php

namespace ArchSendMail\App\Providers\Amazon;

use ArchSendMail\App\Dtos\Mail;
use ArchSendMail\App\Providers\BaseProvider;

class AmazonAdapter extends BaseProvider
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
