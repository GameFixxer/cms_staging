<?php
declare(strict_types=1);

namespace App\Backend\ImportProduct\Business\Model;

use App\Component\Container;

class ImportFilterProvider
{
    private Container $container;
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function getAllFilterList()
    {

    }

    public function getProductFilterList()
    {

        return [
           'category_key' => 'getCategoryKey',
            'category_id' => 'getCategoryId'

        ];
    }

    public function getCategoryFilterList()
    {
        return [

        ];
    }
}
