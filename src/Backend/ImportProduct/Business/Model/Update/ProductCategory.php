<?php
declare(strict_types=1);

namespace App\Backend\ImportProduct\Business\Model\Update;

use App\Backend\ImportProduct\Business\Model\IntegrityManager\CategoryIntegrityManager;
use App\Backend\ImportProduct\Business\Model\IntegrityManager\ValueIntegrityManager;
use App\Client\Category\Business\CategoryBusinessFacadeInterface;
use App\Client\Product\Business\ProductBusinessFacadeInterface;
use App\Model\Dto\CategoryDataTransferObject;
use App\Model\Dto\CsvDataTransferObject;
use App\Model\Dto\ProductDataTransferObject;

class ProductCategory implements ProductInterface
{
    private CategoryIntegrityManager $categoryIntegrityManager;
    private ValueIntegrityManager $valueIntegrityManager;
    private CategoryBusinessFacadeInterface $categoryBusinessFacade;
    private ProductBusinessFacadeInterface $productBusinessFacade;

    public function __construct(
        CategoryBusinessFacadeInterface $categoryBusinessFacade,
        ProductBusinessFacadeInterface $productBusinessFacade,
        CategoryIntegrityManager $categoryIntegrityManager,
        ValueIntegrityManager $integrityManager
    ) {
        $this->categoryBusinessFacade =$categoryBusinessFacade;
        $this->productBusinessFacade = $productBusinessFacade;
        $this->categoryIntegrityManager = $categoryIntegrityManager;
        $this->valueIntegrityManager = $integrityManager;
    }

    public function update(CsvDataTransferObject $csvDTO):void
    {
        if (empty($csvDTO->getCategoryKey())) {
            throw new \Exception('CategoryKey must not be empty', 1);
        } else {
        }
    }
}
