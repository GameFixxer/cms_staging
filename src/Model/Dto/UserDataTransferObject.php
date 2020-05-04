<?php

declare(strict_types=1);

namespace App\Model\Dto;

class UserDataTransferObject
{
    private string $username;
    private int $id;
    private string $password;

    public function __construct()
    {
        $this->username = '';
        $this->password = '';
        $this->id = 0;
    }

    public function setUsername(string $name): void
    {
        $this-> username= $name;
    }


    public function setUserId(int $id): void
    {
        $this->id = $id;
    }

    public function setUserPassword(string $password): void
    {
        $this->password = $password;
    }

    public function getUserId(): int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function getUserPassword(): string
    {
        return $this->password;
    }
}

