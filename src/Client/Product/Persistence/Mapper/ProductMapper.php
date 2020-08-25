<?php
declare(strict_types=1);

namespace App\Client\Product\Persistence\Mapper;

use App\Client\Attribute\Business\AttributeBusinessFacade;
use App\Client\Attribute\Business\AttributeBusinessFacadeInterface;
use App\Client\Attribute\Persistence\Mapper\AttributeMapperInterface;
use App\Client\Category\Business\CategoryBusinessFacadeInterface;
use App\Client\Category\Persistence\Entity\Category;
use App\Client\Product\Persistence\Entity\Product;
use App\Generated\AttributeDataProvider;
use App\Generated\CategoryDataProvider;
use App\Generated\ProductDataProvider;
use Cycle\ORM\Relation\Pivoted\PivotedCollection;

class ProductMapper implements ProductMapperInterface
{
    private AttributeBusinessFacadeInterface $attributeBusinessFacade;
    private CategoryBusinessFacadeInterface $categoryBusinessFacade;

    public function __construct(AttributeBusinessFacadeInterface $attributeBusinessFacade, CategoryBusinessFacadeInterface $categoryBusinessFacade)
    {
        $this->attributeBusinessFacade = $attributeBusinessFacade;
        $this->categoryBusinessFacade = $categoryBusinessFacade;
    }

    public function map(Product $product): ProductDataProvider
    {
        $productDataTransferObject = new ProductDataProvider();
        $productDataTransferObject->setId((int)$product->getId());
        $productDataTransferObject->setName($product->getProductName());
        $productDataTransferObject->setDescription($product->getProductDescription());
        $productDataTransferObject->setArticleNumber($product->getArticleNumber());
        $productDataTransferObject->setCategory($this->mapCategory($product->getCategoryId()));
        $productDataTransferObject->setAttribute($this->mapAttributes($product->getAttributeKey()));
        $productDataTransferObject->setPrice($product->getPrice());

        return $productDataTransferObject;
    }

    /**
     * @param array $attribute
     * @return AttributeDataProvider[]
     */
    private function mapAttributes(string $attribute): array
    {
        $attributes = explode(',', $attribute);
        $mappedAttributes = [];
        foreach ($attributes as $attributeKey) {
            $mappedAttributes[]= $this->attributeBusinessFacade->get($attributeKey);
        }


        return $mappedAttributes;
    }

    private function mapCategory($category):?CategoryDataProvider
    {
        if ($category instanceof Category) {
            return $this->categoryBusinessFacade->get($category->getCategoryId());
        }
        return null;
    }
}
