<?php

namespace ArchLaravelSendMail\Providers\Google;

use ArchLaravelSendMail\Mailer\Infos\Mail;
use ArchLaravelSendMail\Providers\BaseProvider;

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
