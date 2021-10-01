<?php
declare(strict_types=1);
namespace App\Client\User\Persistence\Mapper;

use App\Client\User\Persistence\Entity\User;
use App\Generated\Dto\UserDataTransferObject; ;

interface UserMapperInterface
{
    public function map(User $user): UserDataTransferObject;
}
