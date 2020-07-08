<?php

namespace App\Backend\ImportProduct\Business\Model\IntegrityManager;

use App\Generated\Dto\CsvDataTransferObject;
use App\Generated\Dto\DataTransferObjectInterface;

interface ValueIntegrityManagerInterface
{
    public function checkValuesChanged(CsvDataTransferObject $csvDTO, DataTransferObjectInterface $dto): bool;
}