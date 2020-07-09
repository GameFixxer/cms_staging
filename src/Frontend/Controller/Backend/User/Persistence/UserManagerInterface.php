<?php

namespace App\Frontend\Controller\Backend\User\Persistence;

use App\Generated\Dto\UserDataTransferObject;

interface UserManagerInterface
{
    public function delete(UserDataTransferObject $user): void;

    public function save(UserDataTransferObject $user): void;
}