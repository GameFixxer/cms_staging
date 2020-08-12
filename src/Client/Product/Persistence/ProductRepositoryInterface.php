<?php

namespace App\Client\Product\Persistence;

use App\Generated\ProductDataProvider;

interface ProductRepositoryInterface
{
    /**
     * @return ProductDataProvider[]
     */
    public function getProductList(): array;

    public function getProduct(string $articleNumber): ?ProductDataProvider;
}