<?php
declare(strict_types=1);
namespace App\Backend\ImportProduct\Business\Model\Update;

use App\Generated\Dto\CsvProductDataTransferObject;

interface UpdateInterface
{
    public function performUpdateActions(CsvProductDataTransferObject $csvDTO): void;
}
