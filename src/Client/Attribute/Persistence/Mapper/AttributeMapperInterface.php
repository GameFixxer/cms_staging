<?php

namespace App\Client\Attribute\Persistence\Mapper;

use App\Client\Attribute\Persistence\Entity\Attribute;
use App\Generated\Dto\AttributeDataTransferObject;

interface AttributeMapperInterface
{
    public function map(Attribute $attribute): AttributeDataTransferObject;
}