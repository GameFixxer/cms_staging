<?php
declare(strict_types=1);
namespace App\Backend\ImportProduct\Business\Model\IntegrityManager;

use App\Generated\CategoryDataProvider;
use App\Generated\CsvProductDataProvider;

interface ValueIntegrityManagerInterface
{
    public function checkValuesChanged(CsvProductDataProvider $csvDTO, $dto): bool;
    public function checkObjectValueChanged(CsvProductDataProvider $csvDTO, CategoryDataProvider $categoryDTO):bool;
}