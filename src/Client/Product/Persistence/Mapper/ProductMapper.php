<?php
declare(strict_types=1);

namespace App\Client\Product\Persistence\Mapper;

use App\Client\Product\Persistence\Entity\Product;
use App\Generated\Dto\ProductDataTransferObject;

class ProductMapper implements ProductMapperInterface
{
    public function map(Product $product): ProductDataTransferObject
    {
        $productDataTransferObject = new ProductDataTransferObject();
        $productDataTransferObject->setId((int)$product->getId());
        $productDataTransferObject->setName($product->getProductName());
        $productDataTransferObject->setDescription($product->getProductDescription());
        $productDataTransferObject->setArticleNumber($product->getArticleNumber());
        $productDataTransferObject->setCategory($product->getCategory());
        $productDataTransferObject->setAttribute($product->getAttribute());
        $productDataTransferObject->setPrice($product->getPrice());

        return $productDataTransferObject;
    }
}
