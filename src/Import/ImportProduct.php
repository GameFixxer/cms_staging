<?php
declare(strict_types=1);

namespace App\Import;

use App\Model\Dto\CsvDataTransferObject;
use App\Model\Dto\ProductDataTransferObject;

class ImportProduct
{


    public function extractProduct(CsvDataTransferObject $csvDTO): ? ProductDataTransferObject
    {
        $productDTO = new ProductDataTransferObject();
        $listOfMethods = get_class_methods($productDTO);

        foreach ($listOfMethods as $method) {
            if (str_starts_with($method, 'set')) {
                $stringWithSet = str_replace('set', 'get', $method);
                $productDTO->$method($csvDTO->$stringWithSet());
            }
        }
        if ($productDTO->getProductName() !== '' && $productDTO->getProductDescription() !== '') {
            return $productDTO;
        }
        return null;
    }

}
