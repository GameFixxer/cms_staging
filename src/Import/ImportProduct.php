<?php
declare(strict_types=1);

namespace App\Import;

use App\Model\Dto\CsvDataTransferObject;
use App\Model\Dto\ProductDataTransferObject;
use App\Model\Entity\Product;
use App\Model\Mapper\ProductMapper;

class ImportProduct
{
    private array $listOfProductColumns;
    private ProductMapper $productMapper;
    public function __construct(EntityProvider $entityProvider)
    {
        $this->listOfProductColumns = $entityProvider->getProductEntity();
        $this->productMapper = new ProductMapper();
    }

    public function extractProduct(CsvDataTransferObject $csvDTO): ? ProductDataTransferObject
    {
        $productDTO = new ProductDataTransferObject();
        foreach ($this->listOfProductColumns as $method) {
            $setAction = 'set'.$method;
            $getAction = 'get'.$method;
            $productDTO->$setAction($csvDTO->$getAction());
        }
        if ($this->filteringValidProduct($productDTO)) {
            return $productDTO;
        }
        return null;
    }

    private function filteringValidProduct(ProductDataTransferObject $product):bool
    {
        return $product->getProductName() !== '' && $product->getProductDescription() !=='';
    }
}
