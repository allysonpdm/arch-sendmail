<?php

namespace Allyson\Providers\Amazon;

use Allyson\Mailer\Infos\Mail;
use Allyson\Providers\BaseProvider;

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
