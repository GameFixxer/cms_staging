<?php
declare(strict_types=1);

namespace App\Model\Mapper;

use App\Model\Dto\ProductDataTransferObject;
use App\Model\Entity\Product;

class ProductMapper implements ProductMapperInterface
{
    public function map(Product $product): ProductDataTransferObject
    {
        $productDataTransferObject = new ProductDataTransferObject();
        $productDataTransferObject->setProductId((int)$product->getId());
        $productDataTransferObject->setProductName($product->getName());
        $productDataTransferObject->setProductDescription($product->getDescription());
        $productDataTransferObject->setArticleNumber($product->getArticleNumber());

        return $productDataTransferObject;
    }
}
