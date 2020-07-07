<?php

namespace App\Backend\ImportProduct\Business\Model\IntegrityManager;

use App\Model\Dto\CsvDataTransferObject;
use App\Model\Entity\Product;

interface CategoryIntegrityManagerInterface
{
    public function mapEntity(CsvDataTransferObject $csvDTO): ?object;
}
