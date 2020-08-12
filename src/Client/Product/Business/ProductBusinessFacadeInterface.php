<?php
declare(strict_types=1);
namespace App\Client\Product\Business;

use App\Generated\ProductDataProvider;

interface ProductBusinessFacadeInterface
{
    public function get(string $articleNumber): ?ProductDataProvider;

    /**
     * @return ProductDataProvider[]
     */
    public function getList(): array;

    public function save(ProductDataProvider $product): ProductDataProvider;

    public function delete(ProductDataProvider $product);
}