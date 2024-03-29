<?php

namespace ArchSendMail\App\Dtos;

use PhpObjectValues\App\ObjectValues\Email;
use ArchSendMail\App\ObjectsValues\{
    Destinatario,
    Remetente
};
use Spatie\LaravelData\Data;

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
        $this->destinatario = $this->setDestinatario($destinatario);
        $this->remetente = $this->setRemetente($remetente);
    }

    private function setDestinatario(Destinatario|string $destinatario): Destinatario
    {
        if($destinatario instanceof Destinatario){
            return $destinatario;
        }

        return new Destinatario(email: new Email($destinatario));
    }

    private function setRemetente(Remetente|string $remetente): Remetente
    {
        if($remetente instanceof Remetente){
            return $remetente;
        }

        $remetente = !empty($remetente)
            ? new Email($remetente)
            : null;

        return new Remetente(email: $remetente);
    }
}
