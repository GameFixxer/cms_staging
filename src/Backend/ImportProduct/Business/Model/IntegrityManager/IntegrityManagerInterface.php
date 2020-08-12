<?php

namespace App\Backend\ImportProduct\Business\Model\IntegrityManager;

use App\Generated\CsvProductDataProvider;

interface IntegrityManagerInterface
{
    public function mapEntity(CsvProductDataProvider $csvDTO);
}