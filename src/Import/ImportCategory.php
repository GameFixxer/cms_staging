<?php
declare(strict_types=1);

namespace App\Import;

use App\Model\Dto\CategoryDataTransferObject;
use App\Model\Dto\CsvDataTransferObject;
use App\Model\Entity\Category;
use App\Model\Mapper\CategoryMapper;

class ImportCategory
{
    private array $listOfCategoryColumns;
    private CategoryMapper $categoryMapper;
    public function __construct(EntityProvider $entityProvider)
    {
        $this->listOfCategoryColumns = $entityProvider->getCategoryEntity();
        $this->categoryMapper = new CategoryMapper();
    }

    public function extractCategory(CsvDataTransferObject $csvDTO):?CategoryDataTransferObject
    {
        $categoryEntity = new Category();
        foreach ($this->listOfCategoryColumns as $method) {
            $setAction = 'set'.$method;
            $getAction = 'get'.$method;
            $categoryEntity->$setAction($csvDTO->$getAction());
        }
        if ($this->filteringValidCategory($categoryEntity)) {
            return $this->categoryMapper->map($categoryEntity);
        }
        return null;
    }

    private function filteringValidCategory(Category $product):bool
    {
        if ($product->getCategoryKey() !== '') {
            return true;
        }
        return false;
    }
}
