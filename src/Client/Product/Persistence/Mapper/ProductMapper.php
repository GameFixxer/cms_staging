<?php
declare(strict_types=1);

namespace App\Client\Product\Persistence\Mapper;

use App\Client\Address\Business\AddressBusinessFacadeInterface;
use App\Client\Attribute\Persistence\Mapper\AttributeMapperInterface;
use App\Client\Product\Persistence\Entity\Product;
use App\Generated\AttributeDataProvider;
use App\Generated\ProductDataProvider;
use Cycle\ORM\Relation\Pivoted\PivotedCollection;

class ProductMapper implements ProductMapperInterface
{
    private AttributeMapperInterface $attributeMapper;

    public function __construct(AttributeMapperInterface $attributeMapper)
    {
        $this->attributeMapper = $attributeMapper;
    }

    public function map(Product $product): ProductDataProvider
    {
        $productDataTransferObject = new ProductDataProvider();
        $productDataTransferObject->setId((int)$product->getId());
        $productDataTransferObject->setName($product->getProductName());
        $productDataTransferObject->setDescription($product->getProductDescription());
        $productDataTransferObject->setArticleNumber($product->getArticleNumber());
        $productDataTransferObject->setCategory($product->getCategory());
        $productDataTransferObject->setAttribute($this->mapProducts($product->getAttribute()));
        $productDataTransferObject->setPrice($product->getPrice());

        return $productDataTransferObject;
    }

    /**
     * @param PivotedCollection $address
     * @return AttributeDataProvider[]
     */
    private function mapProducts( $address): array
    {
        $mappedProducts = [];
        foreach ($address->toArray() as $productEntity) {
            $mappedProducts[]= $this->attributeMapper->map($productEntity);
        }
        return $mappedProducts;
    }
}
