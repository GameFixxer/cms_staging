<?php

namespace App\Model\Mapper;

use App\Model\Dto\ProductDataTransferObject;
use App\Model\Entity\Product;

interface ProductMapperInterface
{
    public function map(Product $product): ProductDataTransferObject;
}