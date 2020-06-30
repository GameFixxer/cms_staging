<?php
declare(strict_types=1);

namespace App\Import;


class EntityProvider
{
    public function getProductEntity(): array
    {
        return [
            'ArticleNumber',
            'Category',
            'ProductDescription',
            'ProductName'
        ];
    }
    public function getCategoryEntity():array
    {
        return [
            'CategoryKey',
            'CategoryId'
        ];
    }
}
