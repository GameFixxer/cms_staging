<?php


namespace App\Backend\ImportCategory\Business\Model\Create;

use App\Model\Dto\CsvDataTransferObject;

interface CategoryInterface
{
    public function createCategory(CsvDataTransferObject $csvDTO): ?CsvDataTransferObject;
}