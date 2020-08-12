<?php

namespace App\Client\Product\Persistence;

use App\Generated\ProductDataProvider;


interface ProductEntityManagerInterface
{
    public function delete(ProductDataProvider $product): void;

    public function save(ProductDataProvider $product): ProductDataProvider;
}