<?php

namespace App\Import\Category\Create;

use App\Model\Dto\CsvDataTransferObject;

interface CategoryInterface
{
    public function createCategory(CsvDataTransferObject $csvDTO): ?CsvDataTransferObject;
}