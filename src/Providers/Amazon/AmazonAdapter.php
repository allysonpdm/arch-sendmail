<?php

namespace Allyson\Providers\Amazon;

use Allyson\Providers\BaseProvider;
use Exception as GlobalException;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
use stdClass;

class AmazonAdapter extends BaseProvider
{
    public function __construct()
    {
        $this->usernameSmtp = config('app.username_smtp');
        $this->passwordSmtp = config('app.password_smtp');
        $this->host = config('app.host_smtp');
    }
}