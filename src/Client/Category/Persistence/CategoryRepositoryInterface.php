<?php

namespace App\Client\Category\Persistence;

use App\Generated\CategoryDataProvider;

interface CategoryRepositoryInterface
{
    /**
     * @return CategoryDataProvider[]
     */
    public function getCategoryList(): array;

    public function getCategory(int $categoryId): ?CategoryDataProvider;

    public function getCategoryByKey(string $key): ?CategoryDataProvider;
}