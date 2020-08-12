<?php

namespace App\Backend\ImportAttribute\Business\Model\Update;

use App\Generated\CsvAttributeDataProvider;

interface AttributeImporterInterface
{
    public function performUpdateActions(CsvAttributeDataProvider $csvDTO): void;
}