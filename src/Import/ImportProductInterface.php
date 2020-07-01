<?php

namespace App\Import;

use App\Model\Dto\CsvDataTransferObject;

interface ImportProductInterface
{
    public function importProduct(CsvDataTransferObject $csvDTO): void;
}