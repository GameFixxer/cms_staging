<?php
declare(strict_types=1);
namespace App\Client\Attribute\Persistence;

use App\Generated\AttributeDataProvider;

interface AttributeEntityManagerInterface
{
    public function delete(AttributeDataProvider $attribute): void;

    public function save(AttributeDataProvider $attribute): AttributeDataProvider;
}