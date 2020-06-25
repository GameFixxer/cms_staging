<?php
declare(strict_types=1);

namespace App\Model\Mapper;

use App\Model\Dto\CategoryDataTransferObject;
use App\Model\Entity\Category;

class CategoryMapper implements CategoryMapperInterface
{
    public function map(Category $category): CategoryDataTransferObject
    {
        $categoryDataTransferObject= new CategoryDataTransferObject();
        $categoryDataTransferObject->setCategoryId($category->getId());
        $categoryDataTransferObject->setCategoryKey($category->getKey());
        return $categoryDataTransferObject;
    }
}
