<?php

namespace App\Backend\ImportProduct\Business\Model\Create;

use App\Model\Dto\CsvDataTransferObject;

interface ProductInterface
{
    public function createProduct(CsvDataTransferObject $csvDTO): ?CsvDataTransferObject;
}