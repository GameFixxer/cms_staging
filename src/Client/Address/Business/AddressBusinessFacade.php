<?php

declare(strict_types=1);

namespace App\Client\Address\Business;

use App\Client\Address\Persistence\AddressEntityManagerInterface;
use App\Client\Address\Persistence\AddressRepositoryInterface;
use App\Client\User\Persistence\Entity\User;
use App\Generated\Dto\AddressDataTransferObject;

class AddressBusinessFacade implements AddressBusinessFacadeInterface
{
    /**
     * @var \App\Client\Address\Persistence\AddressRepositoryInterface
     */
    private AddressRepositoryInterface $addressRepository;
    /**
     * @var \App\Client\Address\Persistence\AddressEntityManagerInterface
     */
    private AddressEntityManagerInterface $addressEntityManager;

    /**
     * @param \App\Client\Address\Persistence\AddressRepositoryInterface $addressRepository
     * @param \App\Client\Address\Persistence\AddressEntityManagerInterface $addressEntityManager
     */
    public function __construct(AddressRepositoryInterface $addressRepository, AddressEntityManagerInterface $addressEntityManager)
    {
        $this->addressRepository = $addressRepository;
        $this->addressEntityManager = $addressEntityManager;
    }

    /**
     * @param \App\Client\User\Persistence\Entity\User $user
     * @param string $type
     * @param bool $primary
     *
     * @return \App\Generated\Dto\AddressDataTransferObject|null
     */
    public function get(User $user, string $type, bool $primary): ?AddressDataTransferObject
    {
        return $this->addressRepository->getAddress($user, $type, $primary);
    }

    /**
     * @return AddressDataTransferObject[]
     */

    public function getList(): array
    {
        return $this->addressRepository->getAddressList();
    }

    /**
     * @param \App\Generated\Dto\AddressDataTransferObject $address
     *
     * @return \App\Generated\Dto\AddressDataTransferObject
     */
    public function save(AddressDataTransferObject $address): AddressDataTransferObject
    {
        return $this->addressEntityManager->save($address);
    }

    /**
     * @param \App\Generated\Dto\AddressDataTransferObject $address
     */
    public function delete(AddressDataTransferObject $address)
    {
        $this->addressEntityManager->delete($address);
    }
}
