<?php

namespace App\Import\Create;

use App\Model\Dto\CsvDataTransferObject;

interface ProductInterface
{
    public function createProduct(CsvDataTransferObject $csvDTO): ?CsvDataTransferObject;
}