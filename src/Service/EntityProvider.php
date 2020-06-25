<?php

declare(strict_types=1);

namespace App\Service;

use App\Model\Entity\Category;
use App\Model\Entity\Product;
use App\Model\Entity\User;

class EntityProvider
{
    public function getEntityList(): array
    {
        return [
            Product::class,
            User::class,
            Category::class,
        ];
    }
}
