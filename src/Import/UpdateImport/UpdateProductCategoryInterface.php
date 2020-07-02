<?php

namespace App\Import\UpdateImport;

use App\Model\Dto\CsvDataTransferObject;

interface UpdateProductCategoryInterface
{
    public function updateProductCategory(CsvDataTransferObject $csvDTO): CsvDataTransferObject;
}