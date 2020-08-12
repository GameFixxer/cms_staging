<?php

namespace App\Client\ShoppingCard\Persistence;

use App\Generated\ShoppingCardDataProvider;

interface ShoppingCardRepositoryInterface
{
    /**
     * @param int $id
     * @return ShoppingCardDataProvider
     */
    public function get(int $id): ?ShoppingCardDataProvider;
}