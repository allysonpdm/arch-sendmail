<?php

namespace Allyson\Providers\Amazon;

use Allyson\Providers\BaseProvider;

class AmazonAdapter extends BaseProvider
{
    public function __construct()
    {
        $this->usernameSmtp = config('app.username_smtp');
        $this->passwordSmtp = config('app.password_smtp');
        $this->host = config('app.host_smtp');
    }

    public function api(object $mail): bool
    {
        return false;
    }

    public function sdk(object $mail): bool
    {
        return false;
    }
}