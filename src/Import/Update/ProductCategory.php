<?php
declare(strict_types=1);

namespace App\Import\Update;

use App\Import\IntegrityManager\CategoryIntegrityManager;
use App\Import\IntegrityManager\ValueIntegrityManager;
use App\Model\CategoryEntityManager;
use App\Model\CategoryRepository;
use App\Model\Dto\CategoryDataTransferObject;
use App\Model\Dto\CsvDataTransferObject;
use App\Model\Dto\ProductDataTransferObject;
use App\Model\ProductEntityManager;
use App\Service\Container;

class ProductCategory implements ProductInterface
{
    private CategoryRepository$categoryRepository;
    private CategoryEntityManager $categoryEntityManager;
    private CategoryIntegrityManager $categoryIntegrityManager;
    private ProductEntityManager $productEntityManager;
    private ValueIntegrityManager $valueIntegrityManager;

    public function __construct(
        Container $container
    ) {
        $this->categoryRepository = $container->get(CategoryRepository::class);
        $this->categoryEntityManager = $container->get(CategoryEntityManager::class);
        $this->productEntityManager = $container->get(ProductEntityManager::class);
        $this->categoryIntegrityManager = $container->get(CategoryIntegrityManager::class);
        $this->valueIntegrityManager = $container->get(ValueIntegrityManager::class);
    }

    public function update(CsvDataTransferObject $csvDTO):void
    {
        if ($csvDTO->getCategoryKey() === '') {
            throw new \Exception('CategoryKey must not be empty', 1);
        } else {
            $category = $this->categoryRepository->getCategory($csvDTO->getCategoryId());
            if ($category instanceof CategoryDataTransferObject && $this->valueIntegrityManager->checkValuesChanged($csvDTO, $category)) {
                $csvDTO->setCategoryId($category->getCategoryId());
                $this->saveUpdatedProduct($csvDTO);
            } else {
                $category = new CategoryDataTransferObject();
                $category->setCategoryKey($csvDTO->getCategoryKey());
                $csvDTO->setCategoryId($this->categoryEntityManager->save($category)->getCategoryId());
                $csvDTO->setCategory($this->categoryIntegrityManager->mapEntity($csvDTO));
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
