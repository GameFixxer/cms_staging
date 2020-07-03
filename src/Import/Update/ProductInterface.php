<?php

namespace App\Import\Update;

use App\Model\Dto\CsvDataTransferObject;

interface ProductInterface
{
    public function update(CsvDataTransferObject $csvDTO):void;
}