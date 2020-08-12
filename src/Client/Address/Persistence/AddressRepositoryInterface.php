<?php
declare(strict_types=1);
namespace App\Client\Address\Persistence;

use App\Client\User\Persistence\Entity\User;
use App\Generated\AddressDataProvider;

interface AddressRepositoryInterface
{
    /**
     * @return AddressDataProvider[]
     */
    public function getAddressList(): array;

    public function getAddress(User $user, string $type, bool $primary): ?AddressDataProvider;

    public function getAddressListFromUser(int $userId):array;
}