<?php

namespace App\Frontend\ShoppingCard\Business;

use App\Generated\Dto\ShoppingCardDataTransferObject;

interface ShoppingCardManagerInterface
{
    public function delete(ShoppingCardDataTransferObject $shoppingCardDataTransferObject): void;

    public function save(ShoppingCardDataTransferObject $shoppingCardDataTransferObject): void;
}