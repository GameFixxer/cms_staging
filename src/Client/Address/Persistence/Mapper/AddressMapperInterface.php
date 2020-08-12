<?php
declare(strict_types=1);
namespace App\Client\Address\Persistence\Mapper;

use App\Client\Address\Persistence\Entity\Address;
use App\Generated\AddressDataProvider;

interface AddressMapperInterface
{
    public function map(Address $address): AddressDataProvider;
}