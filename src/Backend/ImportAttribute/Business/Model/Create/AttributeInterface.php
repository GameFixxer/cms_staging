<?php
declare(strict_types=1);
namespace App\Backend\ImportAttribute\Business\Model\Create;

use App\Generated\Dto\CsvAttributeDataTransferObject;

interface AttributeInterface
{
    public function createCategory(CsvAttributeDataTransferObject $csvDTO): ?CsvAttributeDataTransferObject;
}