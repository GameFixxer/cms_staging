<?php
declare(strict_types=1);

namespace App\Client\Attribute\Business;

use App\Client\Attribute\Persistence\AttributeEntityManagerInterface;
use App\Client\Attribute\Persistence\AttributeRepositoryInterface;
use App\Generated\Dto\AttributeDataTransferObject;

class AttributeBusinessFacade implements AttributeBusinessFacadeInterface
{
    private AttributeRepositoryInterface $attributeRepository;
    private AttributeEntityManagerInterface $attributeEntityManager;

    public function __construct(AttributeRepositoryInterface $attributeRepository, AttributeEntityManagerInterface $attributeEntityManager)
    {
        $this->attributeRepository = $attributeRepository;
        $this->attributeEntityManager = $attributeEntityManager;
    }

    public function get(string $attributeKey): ?AttributeDataTransferObject
    {
        return $this->attributeRepository->getAttribute($attributeKey);
    }

    /**
     * @return AttributeDataTransferObject[]
     */

    public function getList():array
    {
        return$this->attributeRepository->getAttributeList();
    }
    public function save(AttributeDataTransferObject $attribute):AttributeDataTransferObject
    {
        return $this->attributeEntityManager->save($attribute);
    }
    public function delete(AttributeDataTransferObject $attribute)
    {
        $this->attributeEntityManager->delete($attribute);
    }
}
