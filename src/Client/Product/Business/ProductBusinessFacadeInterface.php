<?php
declare(strict_types=1);
namespace App\Client\Product\Business;

use App\Generated\Dto\ProductDataTransferObject;

interface ProductBusinessFacadeInterface
{
    public function get(string $articleNumber): ?ProductDataTransferObject;

    /**
     * @return ProductDataTransferObject[]
     */
    public function getList(): array;

    public function save(ProductDataTransferObject $product): ProductDataTransferObject;

    public function delete(ProductDataTransferObject $product);
}