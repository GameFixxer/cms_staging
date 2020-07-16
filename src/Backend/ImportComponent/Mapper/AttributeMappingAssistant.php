<?php


namespace App\Backend\ImportComponent\Mapper;


use App\Backend\ImportComponent\ImportFilterProvider;
use App\Backend\ImportComponent\StringConverter\StringConverter;
use App\Generated\Dto\CsvAttributeDataTransferObject;

class AttributeMappingAssistant implements MappingAssistantInterface
{
    private bool $lowerCamelCase;
    private array $columnAttributes;
    private StringConverter $stringConverter;


    public function __construct(StringConverter $stringConverter, ImportFilterProvider $importFilter)
    {
        $this->lowerCamelCase = true;
        $this->stringConverter = $stringConverter;
        $this->columnAttributes = $importFilter->getAttributeFilterList();
    }

    public function mapInputToDTO(array $headerList, array $product): CsvAttributeDataTransferObject
    {
        $csvDataTransferObject = new  CsvAttributeDataTransferObject();
        foreach ($headerList as $column) {
            $action = 'set'.$this->stringConverter->camelCaseToSnakeCase($column);
            $csvDataTransferObject->$action($product[$column]);
        }
        return $csvDataTransferObject;
    }

    public function createMappingList(array $header)
    {
        $headerList = [];
        foreach ($header as $value) {
            $snakeCase = 'set'.$this->stringConverter->camelCaseToSnakeCase($value);
            $isolateCategory = str_replace('Attribute', '', $snakeCase);
            if (in_array($isolateCategory, $this->columnAttributes)) {
                $headerList[] = $value;
            }
        }
        return $headerList;
    }
}
