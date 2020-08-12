<?php
declare(strict_types=1);

namespace App\Backend\ImportProduct\Business\Model\Update;

use App\Backend\ImportProduct\Business\Model\IntegrityManager\IntegrityManagerInterface;
use App\Backend\ImportProduct\Business\Model\IntegrityManager\ValueIntegrityManagerInterface;
use App\Client\Category\Business\CategoryBusinessFacadeInterface;
use App\Client\Category\Persistence\Entity\Category;
use App\Client\Product\Business\ProductBusinessFacadeInterface;
use App\Generated\CategoryDataProvider;
use App\Generated\ProductDataProvider;
use App\Generated\CsvProductDataProvider;

class ProductCategory implements ProductInterface
{
    private IntegrityManagerInterface $categoryIntegrityManager;
    private ValueIntegrityManagerInterface $valueIntegrityManager;
    private CategoryBusinessFacadeInterface $categoryBusinessFacade;
    private ProductBusinessFacadeInterface $productBusinessFacade;

    public function __construct(
        CategoryBusinessFacadeInterface $categoryBusinessFacade,
        ProductBusinessFacadeInterface $productBusinessFacade,
        IntegrityManagerInterface $categoryIntegrityManager,
        ValueIntegrityManagerInterface $integrityManager
    ) {
        $this->categoryBusinessFacade = $categoryBusinessFacade;
        $this->productBusinessFacade = $productBusinessFacade;
        $this->categoryIntegrityManager = $categoryIntegrityManager;
        $this->valueIntegrityManager = $integrityManager;
    }

    public function update(CsvProductDataProvider $csvDTO):void
    {
        if (empty($csvDTO->getCategoryKey())) {
            throw new \Exception('CategoryKey must not be empty', 1);
        } else {
            $category = $this->categoryBusinessFacade->getByKey($csvDTO->getAttributeKey());
            if (!$category instanceof CategoryDataProvider) {
                $category = new CategoryDataProvider();
                $category->setCategoryKey($csvDTO->getAttributeKey());
                $csvDTO->setCategoryId($this->categoryBusinessFacade->save($category)->getCategoryId());
                $csvDTO->setCategory($this->categoryIntegrityManager->mapEntity($csvDTO));
                $this->saveUpdatedProduct($csvDTO);
            } elseif ($this->valueIntegrityManager->checkValuesChanged($csvDTO, $category) ||
                $this->valueIntegrityManager->checkObjectValueChanged($csvDTO, $category) ||
                !($this->productBusinessFacade->get($csvDTO->getArticleNumber()))->getCategory() instanceof CategoryDataProvider
            ) {
                $csvDTO->setCategoryId($category->getCategoryId());
                $csvDTO->setCategory(($this->categoryIntegrityManager->mapEntity($csvDTO)));
                $this->saveUpdatedProduct($csvDTO);
            }
        }
    }

    private function saveUpdatedProduct(CsvProductDataProvider $csvDTO)
    {
        $productDTO = $this->productBusinessFacade->get($csvDTO->getArticleNumber());
        if (!$productDTO instanceof ProductDataProvider) {
            throw new \Exception('Critical RepositoryError', 1);
        }
        $productDTO->setCategory($csvDTO->getCategory());
        $this->productBusinessFacade->save($productDTO);
    }
}
