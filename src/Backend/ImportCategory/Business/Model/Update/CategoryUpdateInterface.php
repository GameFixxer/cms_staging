<?php


namespace App\Backend\ImportCategory\Business\Model\Update;

use App\Model\Dto\CsvDataTransferObject;

interface CategoryUpdateInterface
{
    public function performUpdateActions(CsvDataTransferObject $csvDTO): void;
}