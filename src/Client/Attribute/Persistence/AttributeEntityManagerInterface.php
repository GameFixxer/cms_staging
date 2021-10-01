<?php
declare(strict_types=1);
namespace App\Client\Attribute\Persistence;

use App\Generated\Dto\AttributeDataTransferObject;

interface AttributeEntityManagerInterface
{
    public function delete(AttributeDataTransferObject $attribute): void;

    public function save(AttributeDataTransferObject $attribute): AttributeDataTransferObject;
}