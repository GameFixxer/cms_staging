<?php
declare(strict_types=1);

namespace App\Backend\ImportCategory\Business\Model\Create;

use App\Generated\Dto\CsvCategoryDataTransferObject;

interface CategoryInterface
{
    public function createCategory(CsvCategoryDataTransferObject $csvDTO): ?CsvCategoryDataTransferObject;
}