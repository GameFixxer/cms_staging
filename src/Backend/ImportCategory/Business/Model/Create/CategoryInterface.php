<?php
declare(strict_types=1);

namespace App\Backend\ImportCategory\Business\Model\Create;

use App\Generated\CsvCategoryDataProvider;

interface CategoryInterface
{
    public function createCategory(CsvCategoryDataProvider $csvDTO): ?CsvCategoryDataProvider;
}