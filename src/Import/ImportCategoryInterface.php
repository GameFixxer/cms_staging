<?php

namespace App\Import;

use App\Model\Dto\CsvDataTransferObject;

interface ImportCategoryInterface
{
    public function importCategory(CsvDataTransferObject $csvDTO): void;
}