<?php

namespace App\Client\ShoppingCard\Persistence;

use App\Generated\ShoppingCardDataProvider;

interface ShoppingCardEntityManagerInterface
{
    public function delete(ShoppingCardDataProvider $shoppingCardDataProvider): void;

    public function save(ShoppingCardDataProvider $shoppingCardDataProvider): ShoppingCardDataProvider;
}