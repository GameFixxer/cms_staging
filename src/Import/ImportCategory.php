<?php
declare(strict_types=1);

namespace App\Import;

use App\Model\Dto\CategoryDataTransferObject;
use App\Model\Dto\CsvDataTransferObject;

class ImportCategory
{


    public function extractCategory(CsvDataTransferObject $csvDTO): ?CategoryDataTransferObject
    {
        $categoryDTO = new CategoryDataTransferObject();
        $listOfMethods = get_class_methods($categoryDTO);

        foreach ($listOfMethods as $method) {
            if (str_starts_with($method, 'set')) {
                $stringWithSet = str_replace('set', 'get', $method);
                $categoryDTO->$method($csvDTO->$stringWithSet());
            }
        }
        if ($categoryDTO->getCategoryKey() !== '') {
            return $categoryDTO;
        }
        return null;
    }

}
