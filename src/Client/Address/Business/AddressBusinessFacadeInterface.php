<?php
declare(strict_types=1);
namespace App\Client\Address\Business;

use App\Client\User\Persistence\Entity\User;
use App\Generated\AddressDataProvider;

interface AddressBusinessFacadeInterface
{
    public function get(User $user, string $type, bool $primary): ?AddressDataProvider;

    /**
     * @return AddressDataProvider[]
     */
    public function getList(): array;

    public function save(AddressDataProvider $address): AddressDataProvider;

    public function delete(AddressDataProvider $address);

    public function getListFromSpecificUser(int $userId):array;
}