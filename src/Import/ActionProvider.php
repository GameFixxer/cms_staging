<?php
declare(strict_types=1);

namespace App\Import;

use App\Import\Update\ProductCategory;
use App\Import\Update\ProductInformation;

class ActionProvider
{
    public function getActionList()
    {
        return [
            ProductCategory::class,
            ProductInformation::class

        ];
    }
}
