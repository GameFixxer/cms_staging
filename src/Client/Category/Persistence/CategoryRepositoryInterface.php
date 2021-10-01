<?php

namespace App\Client\Category\Persistence;

use App\Generated\Dto\CategoryDataTransferObject;

interface CategoryRepositoryInterface
{
    /**
     * @return CategoryDataTransferObject[]
     */
    public function getCategoryList(): array;

    /**
     * @param int $categoryId
     * @return \App\Generated\Dto\CategoryDataTransferObject|null
     */
    public function getCategory(int $categoryId): ?CategoryDataTransferObject;

    /**
     * @param string $key
     * @return \App\Generated\Dto\CategoryDataTransferObject|null
     */
    public function getCategoryByKey(string $key): ?CategoryDataTransferObject;
}