<?php

namespace App\Model;

use App\Model\Dto\CategoryDataTransferObject;

interface CategoryEntityManagerInterface
{
    public function delete(CategoryDataTransferObject $category): void;

    public function save(CategoryDataTransferObject $category): CategoryDataTransferObject;
}