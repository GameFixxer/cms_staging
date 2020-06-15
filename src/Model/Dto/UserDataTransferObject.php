<?php

declare(strict_types=1);

namespace App\Model\Dto;

class UserDataTransferObject
{
    private string $username = '';
    private int $id = 0;
    private string $password = '';
    private string $role = '';


    public function setUsername(string $name): void
    {
        $this-> username = $name;
    }


    public function setUserId(int $id): void
    {
        $this->id = $id;
    }

    public function setUserPassword(string $password): void
    {
        $this->password = $password;
    }

    public function setUserRole(string $role): void
    {
        $this->role = $role;
    }

    public function getUserRole(): string
    {
        return $this->role;
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
