<?php
declare(strict_types=1);
namespace App\Backend\ImportProduct\Business\Model\Create;

use App\Generated\CsvProductDataProvider;

interface ProductInterface
{
    public function createProduct(CsvProductDataProvider $csvDTO): ?CsvProductDataProvider;
}