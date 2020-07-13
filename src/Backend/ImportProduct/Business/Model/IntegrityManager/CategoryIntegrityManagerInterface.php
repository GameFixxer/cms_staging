<?php
declare(strict_types=1);
namespace App\Backend\ImportProduct\Business\Model\IntegrityManager;
use App\Generated\Dto\CsvProductDataTransferObject;

interface CategoryIntegrityManagerInterface
{
    public function mapEntity(CsvProductDataTransferObject $csvDTO): ?object;
}
