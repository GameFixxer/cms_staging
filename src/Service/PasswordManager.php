<?php
declare(strict_types=1);

namespace App\Service;

class PasswordManager
{
    public function encryptPassword(String $password):string
    {
        return password_hash($password, PASSWORD_ARGON2ID);
    }
    public function checkPassword(String $userInputPassword, String $userDatabaseHashedPassword) :bool
    {
        return password_verify($userInputPassword, $userDatabaseHashedPassword);
    }
    public function createResetPassword():string
    {
        $bytes = openssl_random_pseudo_bytes(4);

        return bin2hex($bytes);
    }
}
