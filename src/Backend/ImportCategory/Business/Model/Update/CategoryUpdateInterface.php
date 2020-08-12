<?php
declare(strict_types=1);

namespace App\Backend\ImportCategory\Business\Model\Update;

use App\Generated\CsvCategoryDataProvider;

interface CategoryUpdateInterface
{
    public function performUpdateActions(CsvCategoryDataProvider $csvDTO): void;
}