<?php


namespace App\Client\Attribute\Business;

use App\Client\Attribute\Persistence\AttributeEntityManagerInterface;
use App\Client\Attribute\Persistence\AttributeRepositoryInterface;
use App\Generated\AttributeDataProvider;

class AttributeBusinessFacade implements AttributeBusinessFacadeInterface
{
    private AttributeRepositoryInterface $attributeRepository;
    private AttributeEntityManagerInterface $attributeEntityManager;

    public function __construct(AttributeRepositoryInterface $attributeRepository, AttributeEntityManagerInterface $attributeEntityManager)
    {
        $this->attributeRepository = $attributeRepository;
        $this->attributeEntityManager = $attributeEntityManager;
    }

    public function get(string $attributeKey): ?AttributeDataProvider
    {
        return $this->attributeRepository->getAttribute($attributeKey);
    }

    /**
     * @return AttributeDataProvider[]
     */

    public function getList():array
    {
        return$this->attributeRepository->getAttributeList();
    }
    public function save(AttributeDataProvider $attribute):AttributeDataProvider
    {
        return $this->attributeEntityManager->save($attribute);
    }
    public function delete(AttributeDataProvider $attribute)
    {
        $this->attributeEntityManager->delete($attribute);
    }
}
