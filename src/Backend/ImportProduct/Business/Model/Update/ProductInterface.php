<?php

namespace App\Backend\ImportProduct\Business\Model\Update;

use App\Model\Dto\CsvDataTransferObject;

interface ProductInterface
{
    public function update(CsvDataTransferObject $csvDTO):void;
}