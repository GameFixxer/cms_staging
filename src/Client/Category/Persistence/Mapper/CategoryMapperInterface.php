<?php

namespace App\Client\Category\Persistence\Mapper;

use App\Client\Category\Persistence\Entity\Category;
use App\Generated\Dto\CategoryDataTransferObject;


interface CategoryMapperInterface
{
    public function map(Category $category): CategoryDataTransferObject;
}
