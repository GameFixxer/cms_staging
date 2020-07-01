<?php
declare(strict_types=1);

namespace App\Import;

use App\Model\Dto\CsvDataTransferObject;
use App\Model\Dto\ProductDataTransferObject;
use App\Model\ProductEntityManagerInterface;
use App\Model\ProductRepositoryInterface;

class ImportProduct
{
    private ProductRepositoryInterface $productRepository;
    private ProductEntityManagerInterface $productEntityManager;

    public function __construct(ProductRepositoryInterface $productRepository, ProductEntityManagerInterface $productEntityManager)
    {
        $this->productRepository = $productRepository;
        $this->productEntityManager = $productEntityManager;
    }

    public function importProduct(CsvDataTransferObject $csvDTO): void
    {
        $productDTO = new ProductDataTransferObject();
        $listOfMethods = get_class_methods($productDTO);

        foreach ($listOfMethods as $method) {
            if (str_starts_with($method, 'set')) {
                $stringWithSet = str_replace('set', 'get', $method);
                $productDTO->$method($csvDTO->$stringWithSet());
            }
        }
        if ($productDTO->getProductName() !== '' && $productDTO->getProductDescription() !== '' && $this->checkForValidProductSave($productDTO)) {
            $this->productEntityManager->save($productDTO);
        }
    }

    private function checkForValidProductSave(ProductDataTransferObject $product): bool
    {
        $productFromRepository = $this->productRepository->getProduct($product->getArticleNumber());
        if ($productFromRepository instanceof ProductDataTransferObject && !$this->checkForProductChanges($productFromRepository, $product)) {
            return true;
        } elseif ($product instanceof ProductDataTransferObject && $productFromRepository === null) {
            return true;
        }

        return false;
    }

    private function checkForProductChanges(ProductDataTransferObject $productFromRepository, ProductDataTransferObject $product):bool
    {
        if (
            $productFromRepository->getProductName() === $product->getProductName() &&
            $productFromRepository->getProductDescription() === $product->getProductDescription()) {
            return true;
        }
        return false;
    }
}
