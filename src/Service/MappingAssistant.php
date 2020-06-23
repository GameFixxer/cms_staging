<?php
declare(strict_types=1);
namespace App\Service;

use App\Model\Dto\ProductDataTransferObject;
use App\Model\Entity\Product;
use App\Model\Mapper\ProductImportMapper;
use phpDocumentor\Reflection\Types\Iterable_;

class MappingAssistant
{
    private ProductImportMapper $productMapper;

    public function __construct()
    {
        $this->productMapper = new ProductImportMapper();
    }

    public function mapInputToDTO(array $headerList, array $product): ProductDataTransferObject
    {
        $productEntity = new Product();
        foreach ($headerList as $column) {
            $action = 'set' . $column;
            $productEntity->$action($product[$column]);
        }
        return $this->productMapper->map($productEntity);
    }

    public function createMappingList(array $header)
    {
        $headerList = [];
        $productEntity = new Product();
        foreach ($header as $value) {
            if (method_exists($productEntity, 'set'.$value)) {
                $headerList[]=$value;
            }
        }
        return $headerList;
    }
}
