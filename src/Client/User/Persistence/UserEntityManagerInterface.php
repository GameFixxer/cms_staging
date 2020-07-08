<?php

namespace App\Client\User\Persistence;

use App\Generated\Dto\UserDataTransferObject;

interface UserEntityManagerInterface
{
    public function delete(UserDataTransferObject $user): void;

    public function save(UserDataTransferObject $user): UserDataTransferObject;
}