<?php

namespace App\Import\Category\Update;

use App\Model\Dto\CsvDataTransferObject;

interface CategoryUpdateInterface
{
    public function performUpdateActions(CsvDataTransferObject $csvDTO): void;
}