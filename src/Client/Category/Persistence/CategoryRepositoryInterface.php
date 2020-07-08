<?php

namespace App\Client\Category\Persistence;

use App\Model\Dto\CategoryDataTransferObject;

interface CategoryRepositoryInterface
{
    /**
     * @return CategoryDataTransferObject[]
     */
    public function getCategoryList(): array;

    public function getCategory(int $categoryId): ?CategoryDataTransferObject;

    public function getCategoryByKey(string $key): ?CategoryDataTransferObject;
}