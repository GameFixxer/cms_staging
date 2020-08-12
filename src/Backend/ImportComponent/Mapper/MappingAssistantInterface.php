<?php

namespace App\Backend\ImportComponent\Mapper;

interface MappingAssistantInterface
{
    public function mapInputToDTO(array $headerList, array $product);

    public function createMappingList(array $header);
}
