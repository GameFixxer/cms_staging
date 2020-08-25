<?php
declare(strict_types=1);

namespace App\Client\Category\Persistence\Mapper;

use App\Generated\CategoryDataProvider;
use App\Client\Category\Persistence\Entity\Category;

class CategoryMapper implements CategoryMapperInterface
{
    public function map(Category $category): CategoryDataProvider
    {
        $categoryDataTransferObject = new CategoryDataProvider();
        $categoryDataTransferObject->setCategoryId($category->getId());
        $categoryDataTransferObject->setCategoryKey($category->getKey());
        return $categoryDataTransferObject;
    }
}
