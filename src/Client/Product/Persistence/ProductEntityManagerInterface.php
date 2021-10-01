<?php

namespace App\Client\Product\Persistence;

use App\Generated\Dto\ProductDataTransferObject;


interface ProductEntityManagerInterface
{
    /**
     * @param \App\Generated\Dto\ProductDataTransferObject $product
     */
    public function delete(ProductDataTransferObject $product): void;

    /**
     * @param \App\Generated\Dto\ProductDataTransferObject $product
     * @return \App\Generated\Dto\ProductDataTransferObject
     */
    public function save(ProductDataTransferObject $product): ProductDataTransferObject;
}