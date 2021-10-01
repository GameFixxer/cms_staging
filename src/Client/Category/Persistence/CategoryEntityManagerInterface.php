<?php
declare(strict_types=1);
namespace App\Client\Category\Persistence;

use App\Generated\Dto\CategoryDataTransferObject;

interface CategoryEntityManagerInterface
{
    public function delete(CategoryDataTransferObject $category): void;

    public function save(CategoryDataTransferObject $category): CategoryDataTransferObject;
}