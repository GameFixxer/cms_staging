<?php

namespace App\Client\Attribute\Business;

use App\Generated\AttributeDataProvider;

interface AttributeBusinessFacadeInterface
{
    public function get(string $attributeKey): ?AttributeDataProvider;

    /**
     * @return AttributeDataProvider[]
     */
    public function getList(): array;

    public function save(AttributeDataProvider $attribute): AttributeDataProvider;

    public function delete(AttributeDataProvider $attribute);
}