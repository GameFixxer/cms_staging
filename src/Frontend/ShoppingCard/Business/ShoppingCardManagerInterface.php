<?php

namespace App\Frontend\ShoppingCard\Business;

use App\Generated\Dto\ShoppingCardDataTransferObject;

interface ShoppingCardManagerInterface
{
    public function remove(ShoppingCardDataTransferObject $shoppingCardDataTransferObject, string $articleNumber):void;
    public function add(ShoppingCardDataTransferObject $shoppingCardDataTransferObject, string $articleNumber):void;
}