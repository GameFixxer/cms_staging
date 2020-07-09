<?php
declare(strict_types=1);
namespace App\Backend\ImportProduct\Business\Model\Update;

use App\Generated\Dto\CsvDataTransferObject;

interface UpdateInterface
{
    public function performUpdateActions(CsvDataTransferObject $csvDTO): void;
}