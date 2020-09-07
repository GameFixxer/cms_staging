<?php

declare(strict_types=1);
namespace App\Client\Attribute\Persistence;

use App\Client\Attribute\Persistence\Entity\Attribute;
use App\Client\Attribute\Persistence\Mapper\AttributeMapperInterface;
use App\Generated\AttributeDataProvider;
use Doctrine\ORM\EntityManager;
use Doctrine\Persistence\ObjectRepository;

class AttributeRepository implements AttributeRepositoryInterface
{
    private AttributeMapperInterface $attributeMapper;
    private ObjectRepository $attributeRepository;

    /**
     * ProductRepository constructor.
     * @param AttributeMapperInterface $attributeMapper
     * @param EntityManager $entityManager
     */
    public function __construct(AttributeMapperInterface $attributeMapper, EntityManager $entityManager)
    {
        $this->attributeMapper = $attributeMapper;
        $this->attributeRepository = $entityManager->getRepository(Attribute::class);
    }


    /**
     * @return AttributeDataProvider[]
     */
    public function getAttributeList(): array
    {
        $attributeList = [];
        $attributeEntityList = (array)$this->attributeRepository->findAll();
        /** @var  Attribute $attribute */
        foreach ($attributeEntityList as $attribute) {
            $attributeList[] = $this->attributeMapper->map($attribute);
        }
        return $attributeList;
    }

    public function getAttribute(string $attributeKey): ?AttributeDataProvider
    {
        $attributeEntity = $this->attributeRepository->findBy(['attribute_key'=>$attributeKey]);
        if ($attributeEntity instanceof Attribute) {
            return $this->attributeMapper->map($attributeEntity);
        }
        return null;
    }
}
