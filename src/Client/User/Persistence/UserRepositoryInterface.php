<?php
declare(strict_types=1);
namespace App\Client\User\Persistence;

use App\Generated\Dto\UserDataTransferObject;

interface UserRepositoryInterface
{
    /**
     * @return UserDataTransferObject[]
     */
    public function getUserList(): array;

    /**
     * @param string $username
     * @return \App\Generated\Dto\UserDataTransferObject|null
     */
    public function getUser(string $username): ?UserDataTransferObject;
}