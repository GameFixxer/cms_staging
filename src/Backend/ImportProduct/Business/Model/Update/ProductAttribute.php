<?php


namespace App\Backend\ImportProduct\Business\Model\Update;

use App\Backend\ImportProduct\Business\Model\IntegrityManager\IntegrityManagerInterface;
use App\Backend\ImportProduct\Business\Model\IntegrityManager\ValueIntegrityManagerInterface;
use App\Client\Attribute\Business\AttributeBusinessFacadeInterface;
use App\Client\Product\Business\ProductBusinessFacadeInterface;
use App\Generated\AttributeDataprovider;
use App\Generated\CsvProductDataProvider;
use App\Generated\ProductDataProvider;

class ProductAttribute implements ProductInterface
{
    private AttributeBusinessFacadeInterface $attributeBusinessFacade;
    private ProductBusinessFacadeInterface $productBusinessFacade;
    private ValueIntegrityManagerInterface $valueIntegrityManager;
    private IntegrityManagerInterface $integrityManager;

    public function __construct(
        AttributeBusinessFacadeInterface $attributeBusinessFacade,
        ProductBusinessFacadeInterface $productBusinessFacade,
        ValueIntegrityManagerInterface $valueIntegrityManager,
        IntegrityManagerInterface $integrityManager
    ) {
        $this->attributeBusinessFacade = $attributeBusinessFacade;
        $this->productBusinessFacade = $productBusinessFacade;
        $this->valueIntegrityManager = $valueIntegrityManager;
        $this->integrityManager = $integrityManager;
    }
    public function update(CsvProductDataProvider $csvDTO): void
    {
        if (empty($csvDTO->getAttributeKey())) {
            throw new \Exception('AttributeKey must not be empty', 1);
        }
        $attribute = $this->attributeBusinessFacade->get($csvDTO->getAttributeKey());
        if (!$attribute instanceof AttributeDataprovider) {
            $attribute = new AttributeDataprovider();
            $attribute->setAttributeKey($csvDTO->getAttributeKey());
            $attribute->setAttributeValue($csvDTO->getAttributeValue());
            $attribute->setAttributeId(($this->attributeBusinessFacade->save($attribute))->getAttributeId());
            $csvDTO->setAttributeId($attribute->getAttributeId());
            $csvDTO->setAttribute([$this->integrityManager->mapEntity($csvDTO)]);
            $this->saveUpdatedProduct($csvDTO);
        } elseif ($this->valueIntegrityManager->checkValuesChanged($csvDTO, $attribute)) {
            $attribute->setAttributeKey($csvDTO->getAttributeKey());
            $attribute->setAttributeValue($csvDTO->getAttributeValue());
            $attribute->setAttributeId($this->attributeBusinessFacade->save($attribute)->getAttributeId());
            $csvDTO->setAttributeId($attribute->getAttributeId());
            $csvDTO->setAttribute([$this->integrityManager->mapEntity($csvDTO)]);
            $this->saveUpdatedProduct($csvDTO);
        }
    }

    private function saveUpdatedProduct(CsvProductDataProvider $csvDTO)
    {
        $productDTO = $this->productBusinessFacade->get($csvDTO->getArticleNumber());
        if (!$productDTO instanceof ProductDataProvider) {
            throw new \Exception('Critical RepositoryError', 1);
        }
        $productDTO->setAttribute($csvDTO->getAttribute());
        $this->productBusinessFacade->save($productDTO);
    }
}
