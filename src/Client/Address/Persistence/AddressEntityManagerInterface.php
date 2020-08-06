<?php
declare(strict_types=1);
namespace App\Client\Address\Persistence;

use App\Generated\Dto\AddressDataTransferObject;

interface AddressEntityManagerInterface
{
    public function delete(AddressDataTransferObject $address): void;

    public function save(AddressDataTransferObject $address): AddressDataTransferObject;
}