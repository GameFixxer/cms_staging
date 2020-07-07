<?php
declare(strict_types=1);

namespace App\Backend\ImportProduct\Business\Model\Update;


use App\Backend\ImportProduct\Business\Model\IntegrityManager\CategoryIntegrityManager;
use App\Backend\ImportProduct\Business\Model\IntegrityManager\ValueIntegrityManager;
use App\Model\CategoryEntityManager;
use App\Model\CategoryRepository;
use App\Model\Dto\CategoryDataTransferObject;
use App\Model\Dto\CsvDataTransferObject;
use App\Model\Dto\ProductDataTransferObject;
use App\Model\ProductEntityManager;

class ProductCategory implements ProductInterface
{
    private CategoryRepository$categoryRepository;
    private CategoryEntityManager $categoryEntityManager;
    private CategoryIntegrityManager $categoryIntegrityManager;
    private ProductEntityManager $productEntityManager;
    private ValueIntegrityManager $valueIntegrityManager;

    public function __construct(
        CategoryRepository $categoryRepository,
        CategoryEntityManager $categoryEntityManager,
        ProductEntityManager $productEntityManager,
        CategoryIntegrityManager $categoryIntegrityManager,
        ValueIntegrityManager $integrityManager
    ) {
        $this->categoryRepository = $categoryRepository;
        $this->categoryEntityManager = $categoryEntityManager;
        $this->productEntityManager = $productEntityManager;
        $this->categoryIntegrityManager = $categoryIntegrityManager;
        $this->valueIntegrityManager = $integrityManager;
    }

    public function update(CsvDataTransferObject $csvDTO):void
    {
        if (empty($csvDTO->getCategoryKey())) {
            throw new \Exception('CategoryKey must not be empty', 1);
        } else {
            $category = $this->categoryRepository->getCategoryByKey($csvDTO->getCategoryKey());
            if (!$category instanceof CategoryDataTransferObject) {
                $category = new CategoryDataTransferObject();
                $category->setCategoryKey($csvDTO->getCategoryKey());
                $csvDTO->setCategoryId($this->categoryEntityManager->save($category)->getCategoryId());
                $csvDTO->setCategory($this->categoryIntegrityManager->mapEntity($csvDTO));
                $this->saveUpdatedProduct($csvDTO);
            } elseif ($this->valueIntegrityManager->checkValuesChanged($csvDTO, $category)) {
                $csvDTO->setCategoryId($category->getCategoryId());
                $csvDTO->setCategory(($this->categoryIntegrityManager->mapEntity($csvDTO)));
                $this->saveUpdatedProduct($csvDTO);
            }
        }
    }

    private function saveUpdatedProduct(CsvDataTransferObject $csvDTO)
    {
        $productDTO = new ProductDataTransferObject();
        if (!empty($csvDTO->getProductId())) {
            $productDTO->setProductId($csvDTO->getProductId());
        }

        $productDTO->setArticleNumber($csvDTO->getArticleNumber());
        $productDTO->setCategory($csvDTO->getCategory());
        $this->productEntityManager->save($productDTO);
    }
}
