<?php


namespace App\Backend\ImportAttribute\Business\Model\Create;

use App\Client\Attribute\Business\AttributeBusinessFacadeInterface;
use App\Generated\Dto\AttributeDataTransferObject;
use App\Generated\Dto\CsvAttributeDataTransferObject;

class Attribute implements AttributeInterface
{
    private AttributeBusinessFacadeInterface $attributeBusinessFacade;

    public function __construct(AttributeBusinessFacadeInterface $attributeBusinessFacade)
    {
        $this->attributeBusinessFacade = $attributeBusinessFacade;
    }

    public function createCategory(CsvAttributeDataTransferObject $csvDTO) : ?CsvAttributeDataTransferObject
    {
        if ($csvDTO->getAttributeKey() === '') {
            throw new \Exception('CategoryKey must not be empty', 1);
        }

        $attributeFromRepository = $this->attributeBusinessFacade->get($csvDTO->getAttributeKey());
        if ($attributeFromRepository instanceof \App\Client\Attribute\Persistence\Entity\Attribute) {
            $csvDTO->setAttributeId($attributeFromRepository->getId());
            return $csvDTO;
        }
        $attribute = new AttributeDataTransferObject();
        $attribute->setKey($csvDTO->getAttributeKey());
        $csvDTO->setAttributeId($this->attributeBusinessFacade->save($attribute)->getId());

        return $csvDTO;
    }
}
