<?php
declare(strict_types=1);

namespace App\Backend\ImportProduct\Business\Model;

use App\Backend\ImportProduct\Business\Model\Update\ProductAttribute;
use App\Backend\ImportProduct\Business\Model\Update\ProductCategory;
use App\Backend\ImportProduct\Business\Model\Update\ProductInformation;

class ActionProvider
{
    /**
     * @var \App\Backend\ImportProduct\Business\Model\Update\ProductCategory $productCategory
     */
    private ProductCategory $productCategory;
    /**
     * @var \App\Backend\ImportProduct\Business\Model\Update\ProductInformation $productInformation
     */
    private ProductInformation $productInformation;
    /**
     * @var \App\Backend\ImportProduct\Business\Model\Update\ProductAttribute $productAttribute
     */
    private ProductAttribute $productAttribute;

    /**
     * @param \App\Backend\ImportProduct\Business\Model\Update\ProductCategory $productCategory
     * @param \App\Backend\ImportProduct\Business\Model\Update\ProductInformation $productInformation
     * @param \App\Backend\ImportProduct\Business\Model\Update\ProductAttribute $productAttribute
     */
    public function __construct(
        ProductCategory $productCategory,
        ProductInformation $productInformation,
        ProductAttribute $productAttribute)
    {
        $this->productInformation = $productInformation;
        $this->productCategory = $productCategory;
        $this->productAttribute = $productAttribute;
    }

    /**
     * @return array
     */
    public function getProductActionList():array
    {
        return [
            $this->productCategory,
            $this->productInformation,
            $this->productAttribute
        ];
    }

    public function getCategoryActionList(): array
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
