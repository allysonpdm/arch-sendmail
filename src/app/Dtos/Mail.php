<?php

namespace ArchSendMailLaravel\App\Dtos;

use ArchSendMailLaravel\Mailer\Infos\Destinatario;
use ArchSendMailLaravel\Mailer\Infos\Remetente;

final class Mail extends Data
{
    public Destinatario $destinatario;
    public Remetente $remetente;
    
    public function __construct(
        Destinatario|string $destinatario,
        Remetente|string $remetente,
        public string $assunto,
        public ?string $msgHtml = null,
        public ?string $msgText = null,
        public ?string $configurationSet = null,
        public ?int $SMTPDebug = null,
        public array $attachments = [],
        public array $stringAttachments = [],
    ) {
        $destinatario = $this->setDestinatario($destinatario);
        $remetente = $this->setRemetente($remetente);
    }

    private function setDestinatario(Destinatario|string $destinatario): Destinatario
    {
        if($destinatario instanceof Destinatario){
            return $destinatario;
        }

        return new Destinatario(email: $destinatario);
    }

    private function setRemetente(Remetente|string $remetente): Remetente
    {
        if($remetente instanceof Remetente){
            return $remetente;
        }

        return new Remetente(email: $remetente);
    }
}
