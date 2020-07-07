<?php

namespace App\Backend\ImportProduct\Business\Model\Update;

use App\Model\Dto\CsvDataTransferObject;

interface UpdateInterface
{
    public function performUpdateActions(CsvDataTransferObject $csvDTO): void;
}