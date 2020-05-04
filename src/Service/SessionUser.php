<?php

namespace App\Service;

class SessionUser
{
    public function __construct()
    {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
    }

    public function __destruct()
    {
        //session_destroy();
    }

    public function isLoggedIn(): bool
    {
        return isset($_SESSION['loggedin']);
    }


    public function setUser($name): void
    {
        $_SESSION['username'] = $name;
    }

    public function getUser(): string
    {
        return $_SESSION['username'];
    }
}
