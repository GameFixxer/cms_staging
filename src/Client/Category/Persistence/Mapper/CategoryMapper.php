<?php
declare(strict_types=1);

namespace App\Client\Category\Persistence\Mapper;

use App\Generated\Dto\CategoryDataTransferObject;
use App\Client\Category\Persistence\Entity\Category;

class CategoryMapper implements CategoryMapperInterface
{
    public function map(Category $category): CategoryDataTransferObject
    {
        $categoryDataTransferObject = new CategoryDataTransferObject();
        $categoryDataTransferObject->setCategoryId($category->getCategoryId());
        $categoryDataTransferObject->setCategoryKey($category->getCategoryKey());
        return $categoryDataTransferObject;
    }
}
