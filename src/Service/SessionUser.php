<?php
namespace App\Service;
class SessionUser
{
    public function __construct()
    {
        session_start();
    }

    public function __destruct()
    {
        session_destroy();
    }

    public function isLoggedIn(): bool
    {
        return true;
    }

    public function setUser()
    {
    }
}
