<?php

namespace Allyson\Providers\Google;

use Allyson\Mailer\Infos\Mail;
use Allyson\Providers\BaseProvider;

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
