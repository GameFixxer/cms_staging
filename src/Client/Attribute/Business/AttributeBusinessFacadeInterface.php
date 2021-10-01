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

    /**
     * @param \App\Generated\Dto\AttributeDataTransferObject $attribute
     * @return \App\Generated\Dto\AttributeDataTransferObject
     */
    public function save(AttributeDataTransferObject $attribute): AttributeDataTransferObject;

    /**
     * @param \App\Generated\Dto\AttributeDataTransferObject $attribute
     */
    public function delete(AttributeDataTransferObject $attribute):void ;
}