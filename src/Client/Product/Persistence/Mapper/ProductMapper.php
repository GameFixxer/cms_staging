<?php
declare(strict_types=1);

namespace App\Client\Product\Persistence\Mapper;

use App\Client\Product\Persistence\Entity\Product;
use App\Model\Dto\ProductDataTransferObject;

class ProductMapper implements ProductMapperInterface
{
    public function map(Product $product): ProductDataTransferObject
    {
        $productDataTransferObject = new ProductDataTransferObject();
        $productDataTransferObject->setProductId((int)$product->getId());
        $productDataTransferObject->setProductName($product->getProductName());
        $productDataTransferObject->setProductDescription($product->getProductDescription());
        $productDataTransferObject->setArticleNumber($product->getArticleNumber());
        $productDataTransferObject->setCategory($product->getCategory());

        return $productDataTransferObject;
    }
}
