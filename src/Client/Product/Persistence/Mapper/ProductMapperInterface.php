<?php

namespace App\Client\Product\Persistence\Mapper;

use App\Client\Product\Persistence\Entity\Product;
use App\Generated\Dto\ProductDataTransferObject;


interface ProductMapperInterface
{
    public function map(Product $product): ProductDataTransferObject;
}