<?php


namespace App\Service;

use App\Model\Dto\EmailDataTransferObject;
use Symfony\Component\Mailer\Mailer;
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
    public function createMail(EmailDataTransferObject $emailDTO)
    {
        $this->email = (new Email())
            ->from('r.berndt@nexus-united.com')
            ->to($emailDTO->getTo())
            ->subject($emailDTO->getSubject())
            ->text($emailDTO->getMessage())
            ->html('<p>See Twig integration for better HTML integration!</p>');
    }

    public function sendMail()
    {
        $this->mailer->send($this->email);
    }
}
