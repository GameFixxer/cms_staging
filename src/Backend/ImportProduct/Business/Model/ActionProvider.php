<?php
declare(strict_types=1);

namespace App\Backend\ImportProduct\Business\Model;

use App\Backend\ImportProduct\Business\Model\Update\ProductCategory;
use App\Backend\ImportProduct\Business\Model\Update\ProductInformation;
use App\Component\Container;

class ActionProvider
{
    private ProductCategory $productCategory;
    private ProductInformation $productInformation;
    public function __construct(ProductCategory $productCategory, ProductInformation $productInformation)
    {
        $this->productInformation = $productInformation;
        $this->productCategory = $productCategory;
    }

    public function getProductActionList()
    {
        return [
            $this->productCategory,
            $this->productInformation

        ];
    }

    public function getCategoryActionList()
    {
        return [

        ];
    }
}
