<?php
declare(strict_types=1);

namespace App\Backend\ImportCategory\Business\Model\Create;

use App\Generated\Dto\CsvDataTransferObject;

interface CategoryInterface
{
    public function createCategory(CsvDataTransferObject $csvDTO): ?CsvDataTransferObject;
}