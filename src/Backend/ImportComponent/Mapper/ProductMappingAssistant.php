<?php
declare(strict_types=1);
namespace App\Backend\ImportComponent\Mapper;

use App\Backend\ImportComponent\StringConverter\StringConverter;
use App\Backend\ImportComponent\StringConverter\StringConverterInterface;
use App\Generated\Dto\CsvProductDataTransferObject;

class ProductMappingAssistant implements MappingAssistantInterface
{
    private $attributes;
    private bool $lowerCamelCase;
    private array $columnAttributes;
    private StringConverterInterface $stringConverter;

    public function __construct(StringConverterInterface $stringConverter, array $attributes)
    {
        $this->lowerCamelCase = true;
        $this->attributes = null;
        $this->stringConverter = $stringConverter;
        $this->columnAttributes = $attributes;
    }

    public function mapInputToDTO(array $headerList, array $product): CsvProductDataTransferObject
    {
        $csvDataTransferObject = new CsvProductDataTransferObject();
        foreach ($headerList as $column) {
            $action = 'set'.$this->stringConverter->camelCaseToSnakeCase($column);
            $isolateProduct= str_replace('Product', '', $action);
            $isolateCategory = str_replace('Category', '', $isolateProduct);
            $csvDataTransferObject->$isolateCategory($product[$column]);
        }
        return $csvDataTransferObject;
    }

    public function createMappingList(array $header)
    {
        $headerList = [];
        $csvDTO = new CsvProductDataTransferObject();
        foreach ($header as $value) {
            $snakeCase = 'set'.$this->stringConverter->camelCaseToSnakeCase($value);
            $isolateProduct = str_replace('Product', '', $snakeCase);
            $isolateCategory = str_replace('Category', '', $isolateProduct);
            if (in_array($isolateCategory, $this->columnAttributes)) {
                $headerList[] = $value;
            }
        }
        return $headerList;
    }
}
