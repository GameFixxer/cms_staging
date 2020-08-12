<?php

namespace App\Client\User\Persistence;

use App\Generated\UserDataProvider;

interface UserEntityManagerInterface
{
    public function delete(UserDataProvider $user): void;

    public function save(UserDataProvider $user): UserDataProvider;
}