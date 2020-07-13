<?php
declare(strict_types=1);

namespace App\Backend\ImportComponent;

class ImportFilterProvider
{
    public function __construct()
    {
    }

    public function getProductFilterList()
    {
       return[
           'setKey',
           'setArticleNumber',
           'setDescription',
           'setName'
       ];
    }

    public function getCategoryFilterList()
    {
        return [
            'setKey'
        ];
    }
}
