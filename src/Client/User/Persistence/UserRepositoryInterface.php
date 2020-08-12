<?php

namespace App\Client\User\Persistence;

use App\Generated\UserDataProvider;

interface UserRepositoryInterface
{
    /**
     * @return UserDataProvider[]
     */
    public function getUserList(): array;

    public function getUser(string $username): ?UserDataProvider;
}