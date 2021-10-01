<?php
declare(strict_types=1);
namespace App\Client\Address\Persistence\Mapper;

use App\Client\Address\Persistence\Entity\Address;
use App\Generated\Dto\AddressDataTransferObject;

interface AddressMapperInterface
{
    /**
     * @param \App\Client\Address\Persistence\Entity\Address $address
     * @return \App\Generated\Dto\AddressDataTransferObject
     */
    public function map(Address $address): AddressDataTransferObject;
}