<?php

namespace App\Import\CreateImport;

use App\Model\Dto\CsvDataTransferObject;

interface CreateProductInterface
{
    public function createProduct(CsvDataTransferObject $csvDTO): ?CsvDataTransferObject;
}