<?php
declare(strict_types=1);

namespace App\Client\User\Business;

use App\Model\Dto\UserDataTransferObject;

interface UserBusinessFacadeInterface
{
    public function get(string $username): ?UserDataTransferObject;

    /**
     * @return UserDataTransferObject[]
     */
    public function getList(): array;

    public function save(UserDataTransferObject $user): UserDataTransferObject;

    public function delete(UserDataTransferObject $user);
}