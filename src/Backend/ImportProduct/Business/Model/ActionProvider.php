<?php
declare(strict_types=1);

namespace App\Backend\ImportProduct\Business\Model;

use App\Backend\ImportProduct\Business\Model\Update\ProductAttribute;
use App\Backend\ImportProduct\Business\Model\Update\ProductCategory;
use App\Backend\ImportProduct\Business\Model\Update\ProductInformation;

class ActionProvider
{
    private ProductCategory $productCategory;
    private ProductInformation $productInformation;
    private ProductAttribute $productAttribute;
    public function __construct(
        ProductCategory $productCategory,
        ProductInformation $productInformation,
        ProductAttribute $productAttribute)
    {
        $this->productInformation = $productInformation;
        $this->productCategory = $productCategory;
        $this->productAttribute = $productAttribute;
    }

    public function getProductActionList()
    {
        return [
            $this->productCategory,
            $this->productInformation,
            $this->productAttribute
        ];
    }

    public function getCategoryActionList()
    {
        return [

        ];
    }

    public function getAttributeActionList()
    {
        return [

        ];
    }
}
