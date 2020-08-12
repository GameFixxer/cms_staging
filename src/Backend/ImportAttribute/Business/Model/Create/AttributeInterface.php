<?php

namespace App\Backend\ImportAttribute\Business\Model\Create;

use App\Generated\CsvAttributeDataProvider;

interface AttributeInterface
{
    public function createCategory(CsvAttributeDataProvider $csvDTO): ?CsvAttributeDataProvider;
}