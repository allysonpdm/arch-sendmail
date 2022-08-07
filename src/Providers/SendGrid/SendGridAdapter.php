<?php

namespace Allyson\Providers\SendGrid;

use Allyson\Providers\BaseProvider;

class SendGridAdapter extends BaseProvider
{
    public function api(object $mail): bool
    {
        return false;
    }

    public function sdk(object $mail): bool
    {
        return false;
    }
}