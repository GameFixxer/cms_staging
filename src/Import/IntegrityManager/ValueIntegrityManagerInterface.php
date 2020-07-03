<?php

namespace App\Import\IntegrityManager;

use App\Model\Dto\CsvDataTransferObject;
use App\Model\Dto\DataTransferObjectInterface;

interface ValueIntegrityManagerInterface
{
    public function checkValuesChanged(CsvDataTransferObject $csvDTO, DataTransferObjectInterface $dto): bool;
}