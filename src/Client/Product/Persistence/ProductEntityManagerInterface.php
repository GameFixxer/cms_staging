<?php

namespace App\Client\Product\Persistence;

use App\Model\Dto\ProductDataTransferObject;

interface ProductEntityManagerInterface
{
    public function delete(ProductDataTransferObject $product): void;

    public function save(ProductDataTransferObject $product): ProductDataTransferObject;
}