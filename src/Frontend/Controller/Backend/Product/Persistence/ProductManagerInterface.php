<?php

namespace App\Frontend\Controller\Backend\Product\Persistence;

use App\Generated\Dto\ProductDataTransferObject;

interface ProductManagerInterface
{
    public function delete(ProductDataTransferObject $productDTO): void;

    public function save(ProductDataTransferObject $product): void;
}