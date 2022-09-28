<?php
declare(strict_types=1);

namespace App\Backend\ImportAttribute\Business\Model\Create;

use App\Client\Attribute\Business\AttributeBusinessFacadeInterface;
use App\Generated\Dto\AttributeDataTransferObject;
use App\Generated\Dto\CsvAttributeDataTransferObject;

class Attribute implements AttributeInterface
{
    private AttributeBusinessFacadeInterface $attributeBusinessFacade;

    /**
     * @param \App\Client\Attribute\Business\AttributeBusinessFacadeInterface $attributeBusinessFacade
     */
    public function __construct(AttributeBusinessFacadeInterface $attributeBusinessFacade)
    {
        $this->attributeBusinessFacade = $attributeBusinessFacade;
    }

    /**
     * @param \App\Generated\Dto\CsvAttributeDataTransferObject $csvDTO
     *
     * @return \App\Generated\Dto\CsvAttributeDataTransferObject|null
     * @throws \Exception
     */
    public function createCategory(CsvAttributeDataTransferObject $csvDTO): ?CsvAttributeDataTransferObject
    {
        if (trim($csvDTO->getAttributeKey()) === '') {
            throw new \Exception('CategoryKey must not be empty', 1);
        }

        $attributeFromRepository = $this->attributeBusinessFacade->get($csvDTO->getAttributeKey());
        if ($attributeFromRepository) {
            $csvDTO->setAttributeId($attributeFromRepository->getId());

            return $csvDTO;
        }
        $attribute = new AttributeDataTransferObject();
        $attribute->setKey($csvDTO->getAttributeKey());
        $csvDTO->setAttributeId($this->attributeBusinessFacade->save($attribute)->getId());

        return $csvDTO;
    }
}
