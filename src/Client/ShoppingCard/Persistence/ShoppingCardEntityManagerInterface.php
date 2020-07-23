<?php

namespace App\Client\ShoppingCard\Persistence;

use App\Generated\Dto\ShoppingCardDataTransferObject;

interface ShoppingCardEntityManagerInterface
{
    public function delete(ShoppingCardDataTransferObject $shoppingCardDataTransferObject): void;

    public function save(ShoppingCardDataTransferObject $shoppingCardDataTransferObject): ShoppingCardDataTransferObject;
}