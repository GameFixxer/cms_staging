<?php

namespace App\Import\IntegrityManager;

use App\Model\Dto\CsvDataTransferObject;
use App\Model\Entity\Product;

interface CategoryIntegrityManagerInterface
{
    public function mapEntity(CsvDataTransferObject $csvDTO): ?object;
}
