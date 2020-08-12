<?php
declare(strict_types=1);
namespace App\Backend\ImportProduct\Business\Model\Create;

use App\Generated\Dto\CsvProductDataTransferObject;

interface ProductInterface
{
    public function createProduct(CsvProductDataTransferObject $csvDTO): ?CsvProductDataTransferObject;
}