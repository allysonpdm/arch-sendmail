<?php

namespace ArchSendMailLaravel\App\Contracts;

use ArchSendMailLaravel\App\Dtos\Mail;

interface MailerInterface
{
    public function api(Mail $mail): bool;
    public function smtp(Mail $mail): bool;
    public function sdk(Mail $mail): bool;
}
