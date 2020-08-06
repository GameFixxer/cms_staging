<?php
declare(strict_types=1);
namespace App\Client\Address\Persistence;

use App\Client\User\Persistence\Entity\User;
use App\Generated\Dto\AddressDataTransferObject;

interface AddressRepositoryInterface
{
    /**
     * @return AddressDataTransferObject[]
     */
    public function getAddressList(): array;

    public function getAddress(User $user, string $type, bool $primary): ?AddressDataTransferObject;
}