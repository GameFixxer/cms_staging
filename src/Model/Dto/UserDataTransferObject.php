<?php

declare(strict_types=1);

namespace App\Model\Dto;

class UserDataTransferObject
{
    private string $name;
    private int $id;
    private string $password;

    public function __construct()
    {
        $this->name = '';
        $this->password = '';
        $this->id = 0;
    }

    public function setUsername(string $name): void
    {
        $this->name = $name;
    }


    public function setUserId(int $id): void
    {
        $this->id = $id;
    }

    public function setUserPassword(string $desc): void
    {
        $this->password = $desc;
    }

    public function getUserId(): int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->name;
    }

    public function getUserPassword(): string
    {
        return $this->password;
    }
}

