<?php
declare(strict_types=1);
namespace App\Backend\ImportProduct\Business\Model\Create;

use App\Generated\Dto\CsvDataTransferObject;

interface ProductInterface
{
    public function createProduct(CsvDataTransferObject $csvDTO): ?CsvDataTransferObject;
}