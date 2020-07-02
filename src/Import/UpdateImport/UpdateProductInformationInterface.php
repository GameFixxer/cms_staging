<?php

namespace App\Import\UpdateImport;

use App\Model\Dto\CsvDataTransferObject;

interface UpdateProductInformationInterface
{
    public function updateProductInformation(CsvDataTransferObject $csvDTO): void;
}