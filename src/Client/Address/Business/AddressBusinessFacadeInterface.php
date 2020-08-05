<?php
declare(strict_types=1);
namespace App\Client\Address\Business;

use App\Client\User\Persistence\Entity\User;
use App\Generated\Dto\AddressDataTransferObject;

interface AddressBusinessFacadeInterface
{
    public function get(User $user, string $type, bool $primary): AddressDataTransferObject;

    /**
     * @return AddressDataTransferObject[]
     */
    public function getList(): array;

    public function save(AddressDataTransferObject $address): AddressDataTransferObject;

    public function delete(AddressDataTransferObject $address);
}