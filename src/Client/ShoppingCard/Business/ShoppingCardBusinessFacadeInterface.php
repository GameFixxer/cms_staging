<?php

namespace App\Client\ShoppingCard\Business;

use App\Generated\ShoppingCardDataProvider;

interface ShoppingCardBusinessFacadeInterface
{
    public function get(int $id): ?ShoppingCardDataProvider;

    /**
     * @param ShoppingCardDataProvider $shoppingCardDataProvider
     * @return ShoppingCardDataProvider
     */
    public function save(ShoppingCardDataProvider $shoppingCardDataProvider): ShoppingCardDataProvider;

    public function delete(ShoppingCardDataProvider $shoppingCardDataProvider);
}