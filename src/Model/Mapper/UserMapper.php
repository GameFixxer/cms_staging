<?php
declare(strict_types=1);

namespace App\Model\Mapper;

use App\Model\Dto\UserDataTransferObject;

class UserMapper
{

    public function map(array $product): UserDataTransferObject
    {
        $userDataTransferObject = new UserDataTransferObject();
        $userDataTransferObject->setUserId((int)$product['id']);
        $userDataTransferObject->setUsername($product['name']);
        $userDataTransferObject->setUserPassword($product['description']);

        return $userDataTransferObject;

    }
}
