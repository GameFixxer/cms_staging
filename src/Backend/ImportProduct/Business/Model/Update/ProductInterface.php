<?php
declare(strict_types=1);
namespace App\Backend\ImportProduct\Business\Model\Update;
use App\Generated\Dto\CsvProductDataTransferObject;

interface ProductInterface
{
    public function update(CsvProductDataTransferObject $csvDTO):void;
}