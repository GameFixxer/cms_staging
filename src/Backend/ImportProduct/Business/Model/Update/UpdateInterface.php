<?php
declare(strict_types=1);
namespace App\Backend\ImportProduct\Business\Model\Update;

use App\Generated\CsvProductDataProvider;

interface UpdateInterface
{
    public function performUpdateActions(CsvProductDataProvider $csvDTO): void;
}
