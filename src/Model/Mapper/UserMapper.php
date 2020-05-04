<?php
declare(strict_types=1);

namespace App\Model\Mapper;

use App\Model\Dto\UserDataTransferObject;

class UserMapper
{

    public function map(array $user): UserDataTransferObject
    {
        $userDataTransferObject = new UserDataTransferObject();
        $userDataTransferObject->setUserId((int)$user['id']);
        $userDataTransferObject->setUsername($user['username']);
        $userDataTransferObject->setUserPassword($user['passwort']);

        return $userDataTransferObject;

    }
}
