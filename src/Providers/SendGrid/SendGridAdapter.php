<?php

namespace Allyson\Providers\SendGrid;

use Allyson\Providers\BaseProvider;

class SendGridAdapter extends BaseProvider
{
    public function __construct()
    {
        $this->usernameSmtp = config('app.username_smtp');
        $this->passwordSmtp = config('app.password_smtp');
        $this->host = config('app.host_smtp') ?? 'smtp.sendgrid.net';
        $this->port = config('app.host_port') ?? 587;
    }
}