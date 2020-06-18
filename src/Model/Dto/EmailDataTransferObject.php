<?php
declare(strict_types=1);

namespace App\Model\Dto;

class EmailDataTransferObject
{
    private string $to = '';
    private string $message = '';
    private string $subject = '';


    public function setTo(string $to): void
    {
        $this->to = $to;
    }

    public function setMessage(string $message): void
    {
        $this->message = $message;
    }

    public function setSubject(string $subject): void
    {
        $this->subject = $subject;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getTo(): string
    {
        return $this->to;
    }

    public function getSubject(): string
    {
        return $this->subject;
    }
}
