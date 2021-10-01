<?php
declare(strict_types=1);
namespace App\Client\Product\Persistence;

use App\Generated\Dto\ProductDataTransferObject;

interface ProductRepositoryInterface
{
    /**
     * @return ProductDataTransferObject[]
     */
    public function getProductList(): array;

    public function getProduct(string $articleNumber): ?ProductDataTransferObject;
}