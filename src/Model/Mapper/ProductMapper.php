<?php
declare(strict_types=1);

namespace App\Model\Mapper;

use App\Model\Dto\ProductDataTransferObject;

class ProductMapper
{

    public function map(array $product): ProductDataTransferObject
    {
        $productDataTransferObject = new ProductDataTransferObject();
        $productDataTransferObject->setProductId((int)$product['id']);
        $productDataTransferObject->setProductName($product['name']);
        $productDataTransferObject->setProductDescription($product['description']);

        return $productDataTransferObject;

    }
}
