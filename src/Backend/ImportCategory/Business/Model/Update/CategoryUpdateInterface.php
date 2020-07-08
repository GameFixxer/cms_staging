<?php
declare(strict_types=1);

namespace App\Backend\ImportCategory\Business\Model\Update;



use App\Generated\Dto\CsvDataTransferObject;

interface CategoryUpdateInterface
{
    public function performUpdateActions(CsvDataTransferObject $csvDTO): void;
}