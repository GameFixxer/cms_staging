<?php
declare(strict_types=1);

namespace App\Client\Attribute\Persistence\Mapper;

use App\Client\Attribute\Persistence\Entity\Attribute;
use App\Generated\Dto\AttributeDataTransferObject;

class AttributeMapper implements AttributeMapperInterface
{
    /**
     * @param \App\Client\Attribute\Persistence\Entity\Attribute $attribute
     * @return \App\Generated\Dto\AttributeDataTransferObject
     */
    public function map(Attribute $attribute):AttributeDataTransferObject
    {
        $attributeDTO = new AttributeDataTransferObject();
        $attributeDTO->setId($attribute->getAttributeId());
        $attributeDTO->setKey($attribute->getAttributeKey());
        $attributeDTO->setValue($attribute->getAttributeValue());
        return  $attributeDTO;
    }
}
