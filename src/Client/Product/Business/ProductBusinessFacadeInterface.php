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

    /**
     * @param \App\Generated\Dto\ProductDataTransferObject $product
     * @return \App\Generated\Dto\ProductDataTransferObject
     */
    public function save(ProductDataTransferObject $product): ProductDataTransferObject;

    /**
     * @param \App\Generated\Dto\ProductDataTransferObject $product
     */
    public function delete(ProductDataTransferObject $product):void ;
}