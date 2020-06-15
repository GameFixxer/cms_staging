<?php

namespace App\Model\Mapper;

use App\Model\Dto\UserDataTransferObject;
use App\Model\Entity\User;

interface UserMapperInterface
{
    public function map(User $user): UserDataTransferObject;
}