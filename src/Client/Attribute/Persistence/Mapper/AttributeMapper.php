<?php
declare(strict_types=1);

namespace App\Client\Attribute\Persistence\Mapper;

use App\Client\Attribute\Persistence\Entity\Attribute;
use App\Generated\AttributeDataProvider;

class AttributeMapper implements AttributeMapperInterface
{
    public function map(Attribute $attribute):AttributeDataProvider
    {
        $attributeDTO = new AttributeDataProvider();
        $attributeDTO->setAttributeId($attribute->getId());
        $attributeDTO->setAttributeKey($attribute->getAttributeKey());
        $attributeDTO->setAttributeValue($attribute->getAttributeValue());
        return  $attributeDTO;
    }
}
