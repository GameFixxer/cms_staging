<?php
declare(strict_types=1);

namespace App\Client\Address\Business;

use App\Client\Address\Persistence\AddressEntityManagerInterface;
use App\Client\Address\Persistence\AddressRepositoryInterface;
use App\Client\User\Persistence\Entity\User;
use App\Generated\Dto\AddressDataTransferObject;

class AddressBusinessFacade implements AddressBusinessFacadeInterface
{
    private AddressRepositoryInterface $addressRepository;
    private AddressEntityManagerInterface $addressEntityManager;

    public function __construct(AddressRepositoryInterface $addressRepository, AddressEntityManagerInterface $addressEntityManager)
    {
        $this->addressRepository = $addressRepository;
        $this->addressEntityManager = $addressEntityManager;
    }

    public function get(User $user, string $type, bool $primary): AddressDataTransferObject
    {
        return $this->addressRepository->getAddress($user, $type, $primary);
    }

    /**
     * @return AddressDataTransferObject[]
     */

    public function getList():array
    {
        return$this->addressRepository->getAddressList();
    }
    public function save(AddressDataTransferObject $address):AddressDataTransferObject
    {
        return $this->addressEntityManager->save($address);
    }
    public function delete(AddressDataTransferObject $address)
    {
        $this->addressEntityManager->delete($address);
    }
}
