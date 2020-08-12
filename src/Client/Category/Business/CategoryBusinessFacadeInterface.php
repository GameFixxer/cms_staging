<?php
declare(strict_types=1);
namespace App\Client\Category\Business;

use App\Generated\CategoryDataProvider;

interface CategoryBusinessFacadeInterface
{
    public function get(int $categoryId): ?CategoryDataProvider;

    public function getByKey(string $key): ?CategoryDataProvider;

    /**
     * @return CategoryDataProvider[]
     */
    public function getList();

    public function save(CategoryDataProvider $category): CategoryDataProvider;

    public function delete(CategoryDataProvider $category);
}