<?php

namespace App\Model;

use App\Model\Dto\ProductDataTransferObject;

interface ProductRepositoryInterface
{
    /**
     * @return ProductDataTransferObject[]
     */
    public function getProductList(): array;

    public function getProduct(string $articleNumber): ?ProductDataTransferObject;
}