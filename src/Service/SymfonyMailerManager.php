<?php

declare(strict_types=1);
namespace App\Service;


use App\Generated\Dto\EmailDataTransferObject;
use App\Service\Mailer;
use Symfony\Component\Mailer\Transport\Smtp\EsmtpTransport;
use Symfony\Component\Mime\RawMessage;
use Symfony\Component\Mailer\Transport\Transports;
use Symfony\Component\Mime\Email;

class SymfonyMailerManager
{
    private Mailer $mailer;
    private Email $email;

    public function __construct()
    {
        $this->mailer = new Mailer(new Transports(['main' => new EsmtpTransport('localhost', 1025)]));
    }

    /**
     * @param EmailDataTransferObject $emailDTO
     * @return bool
     * @throws \Symfony\Component\Mailer\Exception\TransportExceptionInterface
     */
    public function sendMail(EmailDataTransferObject $emailDTO): bool
    {
        $this->createMail($emailDTO);
        return $this->mailer->sendMail($this->email);
    }

    /**
     * @param EmailDataTransferObject $emailDTO
     * @return void
     */
    private function createMail(EmailDataTransferObject $emailDTO):void
    {
        $this->email = (new Email())
            ->from('r.berndt@nexus-united.com')
            ->to($emailDTO->getTo())
            ->subject($emailDTO->getSubject())
            ->text($emailDTO->getMessage())
            ->html('<p>See Twig integration for better HTML integration!</p>');
    }
}
