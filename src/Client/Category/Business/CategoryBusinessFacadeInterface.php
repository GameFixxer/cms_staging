<?php
declare(strict_types=1);
namespace App\Client\Category\Business;

use App\Generated\Dto\CategoryDataTransferObject;

interface CategoryBusinessFacadeInterface
{
    public function get(int $categoryId): ?CategoryDataTransferObject;

    public function getByKey(string $key): ?CategoryDataTransferObject;

    /**
     * @return CategoryDataTransferObject[]
     */
    public function getList();

    public function save(CategoryDataTransferObject $category): CategoryDataTransferObject;

    public function delete(CategoryDataTransferObject $category);
}