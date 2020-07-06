<?php
declare(strict_types=1);
namespace App\Import;

use App\Model\Dto\CsvDataTransferObject;

class MappingAssistant
{
    private $attributes;
    private bool $lowerCamelCase;

    public function __construct()
    {
        $this->lowerCamelCase = true;
        $this->attributes = null;
    }

    public function mapInputToDTO(array $headerList, array $product): CsvDataTransferObject
    {
        $csvDataTransferObject = new CsvDataTransferObject();
        foreach ($headerList as $column) {
            $action = 'set'.$this->camelCaseToSnakeCase($column);
            $csvDataTransferObject->$action($product[$column]);
        }
        return $csvDataTransferObject;
    }

    public function createMappingList(array $header)
    {
        $headerList = [];
        $csvDTO = new CsvDataTransferObject();
        foreach ($header as $value) {
            if (method_exists($csvDTO, 'set'.$this->camelCaseToSnakeCase($value))) {
                $headerList[] = $value;
            }
        }
        return $headerList;
    }
    private function camelCaseToSnakeCase(string $propertyName)
    {
        $camelCasedName = preg_replace_callback('/(^|_|\.)+(.)/', function($match) {
            return ('.' === $match[1] ? '_' : '').strtoupper($match[2]);
        }, $propertyName);

        if ($this->lowerCamelCase) {
            $camelCasedName = lcfirst($camelCasedName);
        }

        if (null === $this->attributes || \in_array($camelCasedName, $this->attributes)) {
            return $camelCasedName;
        }

        return $propertyName;
    }




}
