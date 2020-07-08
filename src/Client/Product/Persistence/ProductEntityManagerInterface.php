<?php

namespace App\Client\Product\Persistence;

use App\Generated\Dto\ProductDataTransferObject;


interface ProductEntityManagerInterface
{
    public function delete(ProductDataTransferObject $product): void;

    public function save(ProductDataTransferObject $product): ProductDataTransferObject;
}