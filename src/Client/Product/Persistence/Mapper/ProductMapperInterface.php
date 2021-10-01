<?php

namespace App\Client\Product\Persistence\Mapper;

use App\Client\Product\Persistence\Entity\Product;
use App\Generated\Dto\ProductDataTransferObject;


interface ProductMapperInterface
{
    /**
     * @param \App\Client\Product\Persistence\Entity\Product $product
     * @return \App\Generated\Dto\ProductDataTransferObject
     */
    public function map(Product $product): ProductDataTransferObject;
}