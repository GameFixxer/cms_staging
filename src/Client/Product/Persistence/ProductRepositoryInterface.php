<?php

namespace App\Client\Product\Persistence;

use App\Generated\ProductDataProvider;

interface ProductRepositoryInterface
{
    /**
     * @return ProductDataProvider[]
     */
    public function getList(): array;

    public function get(string $articleNumber): ?ProductDataProvider;
}