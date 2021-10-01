<?php

namespace App\Client\Category\Persistence;

use App\Generated\Dto\CategoryDataTransferObject;

interface CategoryEntityManagerInterface
{
    /**
     * @param \App\Generated\Dto\CategoryDataTransferObject $category
     */
    public function delete(CategoryDataTransferObject $category): void;

    /**
     * @param \App\Generated\Dto\CategoryDataTransferObject $category
     * @return \App\Generated\Dto\CategoryDataTransferObject
     */
    public function save(CategoryDataTransferObject $category): CategoryDataTransferObject;
}