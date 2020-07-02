<?php

namespace App\Import\UpdateImport;

use App\Model\Dto\CsvDataTransferObject;

interface UpdateImportInterface
{
    public function updateProducts(CsvDataTransferObject $csvDTO);
}