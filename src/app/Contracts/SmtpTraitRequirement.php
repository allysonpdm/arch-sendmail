<?php

namespace ArchSendMailLaravel\App\Contracts;

use ArchSendMailLaravel\Dtos\SmtpConfigs;
use PHPMailer\PHPMailer\SMTP;

interface SmtpTraitRequirement
{
    public function setSmtpConfigs(SmtpConfigs $smtpConfig): self;
    public function charSet(string $charSet): self;
    public function setLanguage(string $language): self;
    public function setDebugMode(SMTP $debugMode): self;
}