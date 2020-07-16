<?php

namespace App\Backend\ImportProduct\Business\Model\IntegrityManager;

use App\Generated\Dto\CsvProductDataTransferObject;

interface IntegrityManagerInterface
{
    public function mapEntity(CsvProductDataTransferObject $csvDTO): ?object;
}