<?php

namespace App\Client\Attribute\Business;

use App\Generated\Dto\AttributeDataTransferObject;

interface AttributeBusinessFacadeInterface
{
    public function get(string $attributeKey): ?AttributeDataTransferObject;

    /**
     * @return AttributeDataTransferObject[]
     */
    public function getList(): array;

    public function save(AttributeDataTransferObject $attribute): AttributeDataTransferObject;

    public function delete(AttributeDataTransferObject $attribute);
}