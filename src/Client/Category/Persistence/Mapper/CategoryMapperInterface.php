<?php

namespace App\Client\Category\Persistence\Mapper;

use App\Client\Category\Persistence\Entity\Category;
use App\Generated\CategoryDataProvider;


interface CategoryMapperInterface
{
    public function map(Category $category): CategoryDataProvider;
}
