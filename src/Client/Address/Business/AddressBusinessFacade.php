<?php
declare(strict_types=1);

namespace App\Client\Address\Business;

use App\Client\Address\Persistence\AddressEntityManagerInterface;
use App\Client\Address\Persistence\AddressRepositoryInterface;
use App\Client\User\Persistence\Entity\User;
use App\Generated\AddressDataProvider;

class AddressBusinessFacade implements AddressBusinessFacadeInterface
{
    private AddressRepositoryInterface $addressRepository;
    private AddressEntityManagerInterface $addressEntityManager;

    public function __construct(AddressRepositoryInterface $addressRepository, AddressEntityManagerInterface $addressEntityManager)
    {
        $this->addressRepository = $addressRepository;
        $this->addressEntityManager = $addressEntityManager;
    }

    public function get(User $user, string $type, bool $primary): ?AddressDataProvider
    {
        return $this->addressRepository->getAddress($user, $type, $primary);
    }

    /**
     * @return AddressDataProvider[]
     */

    public function getList():array
    {
        return $this->addressRepository->getAddressList();
    }

    public function getListFromSpecificUser(int $userId):array
    {
        return $this->addressRepository->getAddressListFromUser($userId);
    }

    public function save(AddressDataProvider $address):AddressDataProvider
    {
        return $this->addressEntityManager->save($address);
    }
    public function delete(AddressDataProvider $address)
    {
        $this->addressEntityManager->delete($address);
    }
}