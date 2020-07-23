<?php


namespace App\Backend\ImportProduct\Business\Model\Update;

use App\Backend\ImportProduct\Business\Model\IntegrityManager\IntegrityManagerInterface;
use App\Backend\ImportProduct\Business\Model\IntegrityManager\ValueIntegrityManagerInterface;
use App\Client\Attribute\Business\AttributeBusinessFacadeInterface;
use App\Client\Product\Business\ProductBusinessFacadeInterface;
use App\Generated\Dto\AttributeDataTransferObject;
use App\Generated\Dto\CsvProductDataTransferObject;
use App\Generated\Dto\ProductDataTransferObject;

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
    public function update(CsvProductDataTransferObject $csvDTO): void
    {
        if (empty($csvDTO->getAttributeKey())) {
            throw new \Exception('AttributeKey must not be empty', 1);
        }
        $attribute = $this->attributeBusinessFacade->get($csvDTO->getAttributeKey());
        if (!$attribute instanceof AttributeDataTransferObject) {
            $attribute = new AttributeDataTransferObject();
            $attribute->setKey($csvDTO->getAttributeKey());
            $attribute->setValue($csvDTO->getAttributeValue());
            $attribute->setId(($this->attributeBusinessFacade->save($attribute))->getId());
            $csvDTO->setAttributeId($attribute->getId());
            $csvDTO->setAttribute($this->integrityManager->mapEntity($csvDTO));
            $this->saveUpdatedProduct($csvDTO);
        } elseif ($this->valueIntegrityManager->checkValuesChanged($csvDTO, $attribute)) {
            $attribute->setKey($csvDTO->getAttributeKey());
            $attribute->setValue($csvDTO->getAttributeValue());
            $attribute->setId($this->attributeBusinessFacade->save($attribute)->getId());
            $csvDTO->setAttributeId($attribute->getId());
            $csvDTO->setAttribute($this->integrityManager->mapEntity($csvDTO));
            $this->saveUpdatedProduct($csvDTO);
        }
    }

    private function saveUpdatedProduct(CsvProductDataTransferObject $csvDTO)
    {
        $productDTO = $this->productBusinessFacade->get($csvDTO->getArticleNumber());
        if (!$productDTO instanceof ProductDataTransferObject) {
            throw new \Exception('Critical RepositoryError', 1);
        }
        $productDTO->setAttribute($csvDTO->getAttribute());
        $this->productBusinessFacade->save($productDTO);
    }
}
