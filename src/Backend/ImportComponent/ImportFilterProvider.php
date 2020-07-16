<?php
declare(strict_types=1);

namespace App\Backend\ImportComponent;

class ImportFilterProvider
{
    public function __construct()
    {
    }

    public function getProductFilterList():array
    {
        return[
            'setKey',
            'setArticleNumber',
            'setDescription',
            'setName',
            'setAttributeKey',
            'setAttributeValue'
        ];
    }

    public function getCategoryFilterList():array
    {
        return [
            'setKey'
        ];
    }

    public function getAttributeFilterList():array
    {
        return [
            'setKey',
            'setValue'
        ];
    }
}
