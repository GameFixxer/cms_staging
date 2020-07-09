<?php

namespace App\Backend\ImportComponent\Mapper;

use App\Generated\Dto\CsvDataTransferObject;

interface MappingAssistantInterface
{
    public function mapInputToDTO(array $headerList, array $product): CsvDataTransferObject;

    public function createMappingList(array $header);
}