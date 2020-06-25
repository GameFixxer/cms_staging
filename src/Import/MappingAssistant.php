<?php
declare(strict_types=1);
namespace App\Import;

use App\Model\Dto\CsvDataTransferObject;
use App\Model\Dto\ProductDataTransferObject;
use App\Model\Entity\EntityInterface;
use App\Model\Entity\Product;
use App\Model\Mapper\CsvMapper;
use App\Model\Mapper\ProductImportMapper;
use App\Service\EntityProvider;
use phpDocumentor\Reflection\Types\Iterable_;

class MappingAssistant
{
    private CsvMapper $csvMapper;
    private $attributes;
    private bool $lowerCamelCase;

    public function __construct()
    {
        $this->csvMapper = new CsvMapper();
        $this->lowerCamelCase = true;
        $this->attributes = null;
    }

    public function mapInputToDTO(array $headerList, array $product): ProductDataTransferObject
    {
        $productEntity = new Product();
        foreach ($headerList as $column) {
            $action = 'set' .$this->camelCaseToSnakeCase($column);
            $productEntity->$action($product[$column]);
        }
        return $this->csvMapper->map($productEntity);
    }

    public function mapInputToDTO2(array $headerList, array $product): CsvDataTransferObject
    {
        foreach ($headerList as $column) {
            $chosenEntity = $this->chooseEntity($column);
            if (isset($chosenEntity)) {
                $action = 'set' .$this->selectColumns($chosenEntity, $column);
                $chosenEntity->$action($product[$column]);
            }
        }
        return $this->csvMapper->map($chosenEntity);
    }

    public function createMappingList2(array $header)
    {
        $headerList = [];
        $chosenEntity = null;
        foreach ($header as $value) {
            $chosenEntity = $this->chooseEntity($value);
            if (isset($chosenEntity)) {
                $cleanColumnName = $this->selectColumns($chosenEntity, $value);

                if (method_exists($chosenEntity, 'set' . $cleanColumnName)) {
                    dump($cleanColumnName);
                    $headerList[] = $value;
                }
            }
        }

        return $headerList;
    }

    public function createMappingList(array $header)
    {
        $headerList = [];
        $productEntity = new Product();
        foreach ($header as $value) {
            if (method_exists($productEntity, 'set'.$this->camelCaseToSnakeCase($value))) {
                $headerList[]=$value;
            }
        }
        return $headerList;
    }
    private function camelCaseToSnakeCase(string $propertyName)
    {
        $camelCasedName = preg_replace_callback('/(^|_|\.)+(.)/', function ($match) {
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

    private function chooseEntity($value):?EntityInterface
    {
        $entityProvider = new EntityProvider();
        $list = $entityProvider->getEntityList();
        foreach ($list as $entity) {
            if (strpos($value, $entity::TABLE) !== false) {
                return new $entity();
            }
        }
        return null;
    }

    private function selectColumns(EntityInterface $chosenEntity, $value): ?string
    {
        $cleanedColumnName= strtolower($this->camelCaseToSnakeCase($value));
        $testsString = (string)$chosenEntity::TABLE;
        $counter = 0;
        $cleanColumnName = str_replace($testsString, '', $cleanedColumnName, $counter);

        if (method_exists($chosenEntity, 'set'.$cleanColumnName)) {
            return $cleanColumnName;
        }
        return null;
    }
}
