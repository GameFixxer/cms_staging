<?php
declare(strict_types=1);

namespace App\Client\Address\Persistence\Mapper;

use App\Client\Address\Persistence\Entity\Address;
use App\Generated\Dto\AddressDataTransferObject;
use App\Generated\Dto\ProductDataTransferObject;

class AddressMapper implements AddressMapperInterface
{
    public function map(Address $address): AddressDataTransferObject
    {
        $addressDataTransferObject = new  AddressDataTransferObject();
        $addressDataTransferObject->setUser($address->getUser());
        $addressDataTransferObject->setAddressId($address->getAddressId());
        $addressDataTransferObject->setCountry($address->getCountry());
        $addressDataTransferObject->setPostCode($address->getPostCode());
        $addressDataTransferObject->setStreet($address->getStreet());
        $addressDataTransferObject->setTown($address->getTown());
        $addressDataTransferObject->setType($address->getType());
        $addressDataTransferObject->setPrimary($address->isPrimary());

        return $addressDataTransferObject;
    }
}
