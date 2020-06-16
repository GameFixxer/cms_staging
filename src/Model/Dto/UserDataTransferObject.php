<?php

declare(strict_types=1);

namespace App\Model\Dto;

class UserDataTransferObject
{
    private string $username = '';
    private int $id = 0;
    private string $password = '';
    private string $role = '';
    private string $session_id = '';
    private bool $reset_password = false;


    public function setUsername(string $name): void
    {
        $this-> username = $name;
    }

    public function setSessionId(string $id): void
    {
        $this-> session_id = $id;
    }

    public function setResetPassword(bool $rese): void
    {
        $this-> reset_password= $rese;
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
    public function getResetPassword():bool
    {
        return $this->reset_password;
    }

    public function getSessionId(): string
    {
        return $this->session_id;
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
