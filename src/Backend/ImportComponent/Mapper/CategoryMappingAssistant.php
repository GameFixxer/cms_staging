<?php


namespace App\Backend\ImportComponent\Mapper;

use App\Backend\ImportComponent\StringConverter\StringConverter;
use App\Generated\Dto\CsvCategoryDataTransferObject;
use App\Generated\Dto\CsvDataTransferObject;

class CategoryMappingAssistant implements MappingAssistantInterface
{
    private $attributes;
    private bool $lowerCamelCase;
    private array $columnAttributes;
    private StringConverter $stringConverter;


    public function __construct(StringConverter $stringConverter)
    {
        $this->lowerCamelCase = true;
        $this->attributes = null;
        $this->stringConverter = $stringConverter;
    }

    public function setColumnAttributes()
    {
    }

    public function mapInputToDTO(array $headerList, array $product): CsvCategoryDataTransferObject
    {
        $csvDataTransferObject = new CsvCategoryDataTransferObject();
        foreach ($headerList as $column) {
            $action = 'set'.$this->stringConverter->camelCaseToSnakeCase($column);
            $csvDataTransferObject->$action($product[$column]);
        }
        return $csvDataTransferObject;
    }

    public function createMappingList(array $header)
    {
        $headerList = [];
        $csvDTO = new CsvDataTransferObject();
        foreach ($header as $value) {
            if (method_exists($csvDTO, 'set'.$this->stringConverter->camelCaseToSnakeCase($value))) {
                $headerList[] = $value;
            }
        }
        return $headerList;
    }
}
