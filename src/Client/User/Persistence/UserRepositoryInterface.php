<?php

namespace App\Client\User\Persistence;

use App\Model\Dto\UserDataTransferObject;

interface UserRepositoryInterface
{
    /**
     * @return UserDataTransferObject[]
     */
    public function getUserList(): array;

    public function getUser(string $username): ?UserDataTransferObject;
}