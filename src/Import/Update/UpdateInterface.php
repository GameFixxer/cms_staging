<?php

namespace App\Import\Update;

use App\Model\Dto\CsvDataTransferObject;

interface UpdateInterface
{
    public function performUpdateActions(CsvDataTransferObject $csvDTO): void;
}