<?php
declare(strict_types=1);

namespace App\Client\Address\Persistence\Mapper;

use App\Client\Address\Persistence\Entity\Address;
use App\Client\User\Business\UserBusinessFacadeInterface;
use App\Generated\AddressDataProvider;
use App\Generated\UserDataProvider;

class AddressMapper implements AddressMapperInterface
{
    private UserBusinessFacadeInterface $userBusinessFacade;

    public function __construct(UserBusinessFacadeInterface $userBusinessFacade)
    {
        $this->userBusinessFacade = $userBusinessFacade;
    }

    public function map(Address $address): AddressDataProvider
    {
        $addressDataTransferObject = new  AddressDataProvider();
        $user = $this->userBusinessFacade->getById($address->getUserId()->getUsername());
        if (!$user instanceof UserDataProvider) {
            throw new \Exception('UserRepository Returned null for username:'.$address->getUserId()->getUsername(), 1);
        }
        $addressDataTransferObject->setUser($user);
        $addressDataTransferObject->setAddress_id($address->getId());
        $addressDataTransferObject->setCountry($address->getCountry());
        $addressDataTransferObject->setPostCode($address->getPostCode());
        $addressDataTransferObject->setStreet($address->getStreet());
        $addressDataTransferObject->setTown($address->getTown());
        $addressDataTransferObject->setType($address->getType());
        $addressDataTransferObject->setFirstName($address->getFirstName());
        $addressDataTransferObject->setLastName($address->getLastName());

        return $addressDataTransferObject;
    }
}
