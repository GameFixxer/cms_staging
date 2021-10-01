<?php
declare(strict_types=1);
namespace App\Client\User\Persistence;

use App\Generated\Dto\UserDataTransferObject;

interface UserEntityManagerInterface
{
    /**
     * @param \App\Generated\Dto\UserDataTransferObject $user
     */
    public function delete(UserDataTransferObject $user): void;

    /**
     * @param \App\Generated\Dto\UserDataTransferObject $user
     * @return \App\Generated\Dto\UserDataTransferObject
     */
    public function save(UserDataTransferObject $user): UserDataTransferObject;
}