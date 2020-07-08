<?php

namespace App\Client\Category\Persistence\Mapper;

use App\Client\Category\Persistence\Entity\Category;
use App\Model\Dto\CategoryDataTransferObject;

interface CategoryMapperInterface
{
    public function map(Category $category): CategoryDataTransferObject;
}
