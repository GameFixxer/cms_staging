<?php
declare(strict_types=1);

namespace App\Model\Mapper;

use App\Model\Dto\UserDataTransferObject;
use App\Model\Entity\User;

class UserMapper
{

    public function map(User $user): UserDataTransferObject
    {
        $userDataTransferObject = new UserDataTransferObject();
        $userDataTransferObject->setUserId((int)$user->getId());
        $userDataTransferObject->setUsername($user->getUsername());
        $userDataTransferObject->setUserPassword($user->getPassword());

        return $userDataTransferObject;

    }
}
