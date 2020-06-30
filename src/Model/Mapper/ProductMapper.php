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
        $productDataTransferObject->setId((int)$product->getId());
        $productDataTransferObject->setProductName($product->getProductName());
        $productDataTransferObject->setProductDescription($product->getProductDescription());
        $productDataTransferObject->setArticleNumber($product->getArticleNumber());
        $productDataTransferObject->setCategory($product->getCategory());

        return $productDataTransferObject;
    }
}
