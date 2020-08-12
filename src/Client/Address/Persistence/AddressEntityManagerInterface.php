<?php
declare(strict_types=1);
namespace App\Client\Address\Persistence;

use App\Generated\AddressDataProvider;

interface AddressEntityManagerInterface
{
    public function delete(AddressDataProvider $address): void;

    public function save(AddressDataProvider $address): AddressDataProvider;
}