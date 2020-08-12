<?php

namespace App\Client\Attribute\Persistence;

use App\Generated\AttributeDataProvider;

interface AttributeRepositoryInterface
{
    /**
     * @return AttributeDataProvider[]
     */
    public function getAttributeList(): array;

    public function getAttribute(string $attributeKey): ?AttributeDataProvider;
}