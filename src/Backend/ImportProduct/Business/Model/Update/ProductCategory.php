<?php
declare(strict_types=1);

namespace App\Backend\ImportProduct\Business\Model\Update;


use App\Backend\ImportProduct\Business\Model\IntegrityManager\CategoryIntegrityManager;
use App\Backend\ImportProduct\Business\Model\IntegrityManager\ValueIntegrityManager;
use App\Client\Category\Business\CategoryBusinessFacadeInterface;
use App\Client\Product\Business\ProductBusinessFacadeInterface;
use App\Generated\Dto\CategoryDataTransferObject;
use App\Generated\Dto\CsvDataTransferObject;
use App\Generated\Dto\ProductDataTransferObject;
use App\Generated\Dto\CsvProductDataTransferObject;

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
        $this->categoryBusinessFacade = $categoryBusinessFacade;
        $this->productBusinessFacade = $productBusinessFacade;
        $this->categoryIntegrityManager = $categoryIntegrityManager;
        $this->valueIntegrityManager = $integrityManager;
    }

    public function update(CsvProductDataTransferObject $csvDTO):void
    {
        if (empty($csvDTO->getKey())) {
            throw new \Exception('CategoryKey must not be empty', 1);
        } else {

            $category = $this->categoryBusinessFacade->getByKey($csvDTO->getKey());
            if (!$category instanceof CategoryDataTransferObject) {
                $category = new CategoryDataTransferObject();
                $category->setCategoryKey($csvDTO->getKey());
                $csvDTO->setCategoryId($this->categoryBusinessFacade->save($category)->getCategoryId());
                $csvDTO->setCategory($this->categoryIntegrityManager->mapEntity($csvDTO));
                $this->saveUpdatedProduct($csvDTO);
            } elseif ($this->valueIntegrityManager->checkValuesChanged($csvDTO, $category)) {
                $csvDTO->setCategoryId($category->getCategoryId());
                $csvDTO->setCategory(($this->categoryIntegrityManager->mapEntity($csvDTO)));
                $this->saveUpdatedProduct($csvDTO);
            }
        }
    }

    private function saveUpdatedProduct(CsvProductDataTransferObject $csvDTO)
    {
        $productDTO = new ProductDataTransferObject();
        if (!empty($csvDTO->getId())) {
            $productDTO->setId($csvDTO->getId());
        }

        $productDTO->setArticleNumber($csvDTO->getArticleNumber());
        $productDTO->setCategory($csvDTO->getCategory());
        $this->productBusinessFacade->save($productDTO);
    }
}
