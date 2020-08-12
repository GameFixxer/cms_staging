<?php


namespace App\Client\Attribute\Persistence;

use App\Client\Attribute\Persistence\Entity\Attribute;
use App\Client\Attribute\Persistence\Mapper\AttributeMapperInterface;
use App\Generated\AttributeDataProvider;

class AttributeRepository implements AttributeRepositoryInterface
{
    private AttributeMapperInterface $attributeMapper;
    private \Cycle\ORM\RepositoryInterface $ormAttributeRepository;

    /**
     * ProductRepository constructor.
     * @param AttributeMapperInterface $attributeMapper
     * @param \Cycle\ORM\ORM $ormAttributeRepository
     */
    public function __construct(AttributeMapperInterface $attributeMapper, \Cycle\ORM\ORM $ormAttributeRepository)
    {
        $this->attributeMapper = $attributeMapper;
        $this->ormAttributeRepository = $ormAttributeRepository->getRepository(Attribute::class);
    }


    /**
     * @return AttributeDataProvider[]
     */
    public function getAttributeList(): array
    {
        $attributeList = [];
        $attributeEntityList = (array)$this->ormAttributeRepository->select()->fetchALl();
        /** @var  Attribute $attribute */
        foreach ($attributeEntityList as $attribute) {
            $attributeList[] = $this->attributeMapper->map($attribute);
        }
        return $attributeList;
    }

    public function getAttribute(string $attributeKey): ?AttributeDataProvider
    {
        $attributeEntity = $this->ormAttributeRepository->findOne(['attribute_key'=>$attributeKey]);
        if ($attributeEntity instanceof Attribute) {
            return $this->attributeMapper->map($attributeEntity);
        }
        return null;
    }
}
