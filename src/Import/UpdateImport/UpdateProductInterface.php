<?php

namespace App\Import\UpdateImport;

use App\Model\Dto\CsvDataTransferObject;

interface UpdateProductInterface
{
    public function updateProductData(CsvDataTransferObject $csvDTO): void;
}