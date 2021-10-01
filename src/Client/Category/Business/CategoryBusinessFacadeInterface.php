<?php
declare(strict_types=1);
namespace App\Client\Category\Business;

use App\Generated\Dto\CategoryDataTransferObject;

interface CategoryBusinessFacadeInterface
{
    /**
     * @param int $categoryId
     * @return \App\Generated\Dto\CategoryDataTransferObject|null
     */
    public function get(int $categoryId): ?CategoryDataTransferObject;

    /**
     * @param string $key
     * @return \App\Generated\Dto\CategoryDataTransferObject|null
     */
    public function getByKey(string $key): ?CategoryDataTransferObject;

    /**
     * @return CategoryDataTransferObject[]
     */
    public function getList():array;

    /**
     * @param \App\Generated\Dto\CategoryDataTransferObject $category
     * @return \App\Generated\Dto\CategoryDataTransferObject
     */
    public function save(CategoryDataTransferObject $category): CategoryDataTransferObject;

    /**
     * @param \App\Generated\Dto\CategoryDataTransferObject $category
     */
    public function delete(CategoryDataTransferObject $category):void;
}