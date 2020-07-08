<?php

namespace App\Backend\ImportProduct\Business\Model\IntegrityManager;

use App\Generated\Dto\CsvDataTransferObject;

interface CategoryIntegrityManagerInterface
{
    public function mapEntity(CsvDataTransferObject $csvDTO): ?object;
}
