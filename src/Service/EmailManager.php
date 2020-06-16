<?php


namespace App\Service;

use App\Model\Dto\EmailDataTransferObject;

class EmailManager
{
    public function sendMail(EmailDataTransferObject $emailDTO):bool
    {

        return mail($emailDTO->getTo(), $emailDTO->getSubject(), $emailDTO->getMessage(), 'from: r.berndt@nexus-united.com');
    }
}
