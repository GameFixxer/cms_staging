<?php

namespace App\Client\ShoppingCard\Business;

use App\Client\User\Persistence\Entity\User;
use App\Generated\Dto\ShoppingCardDataTransferObject;

interface ShoppingCardBusinessFacadeInterface
{
    public function get(User $user): ?ShoppingCardDataTransferObject;

    /**
     * @return ShoppingCardDataTransferObject[]
     */
    public function getList(): array;

    public function save(ShoppingCardDataTransferObject $shoppingCardDataTransferObject): ShoppingCardDataTransferObject;

    public function delete(ShoppingCardDataTransferObject $shoppingCardDataTransferObject);
}