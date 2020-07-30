<?php

namespace App\Frontend\Product\Business;

use App\Generated\Dto\ProductDataTransferObject;

interface ProductManagerInterface
{
    public function delete(ProductDataTransferObject $productDTO): void;

    public function save(ProductDataTransferObject $product): void;

    public function addToShoppingCard(string $articleNumber):ProductDataTransferObject;
}
