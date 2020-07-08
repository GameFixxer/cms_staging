<?php
declare(strict_types=1);

namespace App\Client\User\Persistence\Mapper;

use App\Model\Dto\UserDataTransferObject;
use App\Client\User\Persistence\Entity\User;

class UserMapper implements UserMapperInterface
{

    public function map(User $user): UserDataTransferObject
    {
        $userDataTransferObject = new UserDataTransferObject();
        $userDataTransferObject->setUserId((int)$user->getId());
        $userDataTransferObject->setUsername($user->getUsername());
        $userDataTransferObject->setUserPassword($user->getPassword());
        $userDataTransferObject->setUserRole($user->getRole());
        $userDataTransferObject->setSessionId($user->getSessionId());
        $userDataTransferObject->setResetPassword($user->getResetPassword());

        return $userDataTransferObject;

    }
}
