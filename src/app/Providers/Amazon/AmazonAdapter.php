<?php

namespace ArchSendMailLaravel\Providers\Amazon;

use ArchSendMailLaravel\App\Dtos\Mail;
use ArchSendMailLaravel\Providers\BaseProvider;

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
