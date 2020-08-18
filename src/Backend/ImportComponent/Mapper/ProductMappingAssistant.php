<?php
declare(strict_types=1);
namespace App\Backend\ImportComponent\Mapper;

use App\Backend\ImportComponent\ImportFilterProvider;
use App\Backend\ImportComponent\StringConverter\StringConverterInterface;
use App\Generated\CsvProductDataProvider;

class ProductMappingAssistant implements MappingAssistantInterface
{
    private $attributes;
    private bool $lowerCamelCase;
    private array $columnAttributes;
    private StringConverterInterface $stringConverter;

    public function __construct(StringConverterInterface $stringConverter, ImportFilterProvider $importFilter)
    {
        $this->lowerCamelCase = true;
        $this->attributes = null;
        $this->stringConverter = $stringConverter;
        $this->columnAttributes = $importFilter->getProductFilterList();
    }

    public function mapInputToDTO(array $headerList, array $product): CsvProductDataProvider
    {
        $csvDataTransferObject = new CsvProductDataProvider();
        foreach ($headerList as $column) {
            $action = 'set'.$this->stringConverter->camelCaseToSnakeCase($column);
            $isolateProduct = str_replace('Product', '', $action);
            //$isolateCategory = str_replace('Category', '', $isolateProduct);
            dump($isolateProduct);
            $csvDataTransferObject->$isolateProduct($product[$column]);
        }
        return $csvDataTransferObject;
    }

    public function createMappingList(array $header)
    {
        $headerList = [];
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
