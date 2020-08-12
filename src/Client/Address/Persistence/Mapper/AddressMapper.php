<?php
declare(strict_types=1);

namespace App\Client\Address\Persistence\Mapper;

use App\Client\Address\Persistence\Entity\Address;
use App\Client\User\Business\UserBusinessFacadeInterface;
use App\Generated\AddressDataProvider;

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
        $addressDataTransferObject->setUser($this->userBusinessFacade->get($address->getUser()->getUsername()));
        $addressDataTransferObject->setAddress_id($address->getAddressId());
        $addressDataTransferObject->setCountry($address->getCountry());
        $addressDataTransferObject->setPostCode($address->getPostCode());
        $addressDataTransferObject->setStreet($address->getStreet());
        $addressDataTransferObject->setTown($address->getTown());
        $addressDataTransferObject->setType($address->getType());
        $addressDataTransferObject->setActive($address->getActive());
        $addressDataTransferObject->setFirstName($address->getFirstName());
        $addressDataTransferObject->setLastName($address->getLastName());

        return $addressDataTransferObject;
    }
}
