<?php
declare(strict_types=1);
namespace App\Client\Attribute\Persistence;

use App\Generated\Dto\AttributeDataTransferObject;

interface AttributeRepositoryInterface
{
    /**
     * @return AttributeDataTransferObject[]
     */
    public function getAttributeList(): array;

    public function getAttribute(string $attributeKey): ?AttributeDataTransferObject;
}