<?php


namespace App\Client\Attribute\Business;

use App\Client\Attribute\Persistence\AttributeEntityManagerInterface;
use App\Client\Attribute\Persistence\AttributeRepositoryInterface;
use App\Generated\Dto\AttributeDataTransferObject;

class AttributeBusinessFacade implements AttributeBusinessFacadeInterface
{
    /**
     * @var \App\Client\Attribute\Persistence\AttributeRepositoryInterface
     */
    private AttributeRepositoryInterface $attributeRepository;
    /**
     * @var \App\Client\Attribute\Persistence\AttributeEntityManagerInterface
     */
    private AttributeEntityManagerInterface $attributeEntityManager;

    /**
     * @param \App\Client\Attribute\Persistence\AttributeRepositoryInterface $attributeRepository
     * @param \App\Client\Attribute\Persistence\AttributeEntityManagerInterface $attributeEntityManager
     */
    public function __construct(AttributeRepositoryInterface $attributeRepository, AttributeEntityManagerInterface $attributeEntityManager)
    {
        $this->attributeRepository = $attributeRepository;
        $this->attributeEntityManager = $attributeEntityManager;
    }

    /**
     * @param string $attributeKey
     * @return \App\Generated\Dto\AttributeDataTransferObject|null
     */
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

    /**
     * @param \App\Generated\Dto\AttributeDataTransferObject $attribute
     * @return \App\Generated\Dto\AttributeDataTransferObject
     */
    public function save(AttributeDataTransferObject $attribute):AttributeDataTransferObject
    {
        return $this->attributeEntityManager->save($attribute);
    }

    /**
     * @param \App\Generated\Dto\AttributeDataTransferObject $attribute
     */
    public function delete(AttributeDataTransferObject $attribute):void
    {
        $this->attributeEntityManager->delete($attribute);
    }
}
