<?php

namespace App\Model\Mapper;

use App\Model\Dto\CategoryDataTransferObject;
use App\Model\Entity\Category;

interface CategoryMapperInterface
{
    public function map(Category $category): CategoryDataTransferObject;
}