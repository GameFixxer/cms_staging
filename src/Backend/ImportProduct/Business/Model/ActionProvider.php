<?php
declare(strict_types=1);

namespace App\Backend\ImportProduct\Business\Model;

use App\Backend\ImportProduct\Business\Model\Update\ProductCategory;
use App\Backend\ImportProduct\Business\Model\Update\ProductInformation;
use App\Service\Container;

class ActionProvider
{
    private Container $container;
    public function __construct(Container $container)
    {
        $this->container = $container;
    }

    public function getProductActionList()
    {
        return [
            $this->container->get(ProductCategory::class),
            $this->container->get(ProductInformation::class)

        ];
    }

    public function getCategoryActionList()
    {
        return [

        ];
    }
}
