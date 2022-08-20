<?php

namespace ArchLaravelSendMail\Providers\Amazon;

use ArchLaravelSendMail\Mailer\Infos\Mail;
use ArchLaravelSendMail\Providers\BaseProvider;

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
