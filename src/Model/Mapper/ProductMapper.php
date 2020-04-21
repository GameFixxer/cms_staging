<?php
declare(strict_types=1);

namespace App\Model\Mapper;

use App\Model\ProductDataTransferObject;

class ProductMapper
{

    public function map(array $product): ProductDataTransferObject
    {
        $productDataTransferObject = new ProductDataTransferObject();
        $productDataTransferObject->setProductId($product['id']);
        $productDataTransferObject->setProductName($product['productname']);
        $productDataTransferObject->setProductDescr($product['description']);

        return $productDataTransferObject;

    }
}
