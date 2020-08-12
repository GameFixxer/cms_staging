<?php

namespace App\Client\Attribute\Persistence\Mapper;

use App\Client\Attribute\Persistence\Entity\Attribute;
use App\Generated\AttributeDataProvider;

interface AttributeMapperInterface
{
    public function map(Attribute $attribute): AttributeDataProvider;
}