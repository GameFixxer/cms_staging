<?php

namespace App\Client\User\Persistence;

use App\Client\User\Persistence\Entity\User;
use App\Generated\UserDataProvider;

interface UserRepositoryInterface
{
    /**
     * @return UserDataProvider[]
     */
    public function getList(): array;

    public function get(string $username): ?UserDataProvider;

    public function getEntity(string $username):?User;
}