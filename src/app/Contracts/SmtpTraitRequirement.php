<?php

namespace ArchSendMail\App\Contracts;

use ArchSendMail\App\Dtos\SmtpConfigs;
use PHPMailer\PHPMailer\SMTP;

interface SmtpTraitRequirement
{
    public function setSmtpConfigs(SmtpConfigs $smtpConfig): self;
    public function charSet(string $charSet): self;
    public function setLanguage(string $language): self;
    public function setDebugMode(int $debugMode): self;
}
