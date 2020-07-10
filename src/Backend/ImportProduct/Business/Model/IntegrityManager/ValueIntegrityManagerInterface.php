<?php
declare(strict_types=1);
namespace App\Backend\ImportProduct\Business\Model\IntegrityManager;

use App\Generated\Dto\CsvProductDataTransferObject;
use App\Generated\Dto\DataTransferObjectInterface;

interface ValueIntegrityManagerInterface
{
    public function checkValuesChanged(CsvProductDataTransferObject $csvDTO, DataTransferObjectInterface $dto): bool;
}