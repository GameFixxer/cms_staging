<?php

namespace App\Frontend\Product\Business;

use App\Generated\ProductDataProvider;

interface ProductManagerInterface
{
    public function delete(ProductDataProvider $productDTO): void;

    public function save(ProductDataProvider $product): void;

    public function addPriceToShoppingCard(string $articleNumber):ProductDataProvider;
}
