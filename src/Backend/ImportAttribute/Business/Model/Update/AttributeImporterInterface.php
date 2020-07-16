<?php

namespace App\Backend\ImportAttribute\Business\Model\Update;

use App\Generated\Dto\CsvAttributeDataTransferObject;

interface AttributeImporterInterface
{
    public function performUpdateActions(CsvAttributeDataTransferObject $csvDTO): void;
}