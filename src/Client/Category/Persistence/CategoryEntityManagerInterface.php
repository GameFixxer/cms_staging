<?php

namespace App\Client\Category\Persistence;

use App\Generated\CategoryDataProvider;

interface CategoryEntityManagerInterface
{
    public function delete(CategoryDataProvider $category): void;

    public function save(CategoryDataProvider $category): CategoryDataProvider;
}