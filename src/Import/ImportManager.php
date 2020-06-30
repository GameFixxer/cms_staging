<?php
declare(strict_types=1);
namespace App\Import;

use App\Model\CategoryRepository;
use App\Model\Dto\CategoryDataTransferObject;
use App\Model\Dto\ProductDataTransferObject;
use App\Model\ProductRepository;

class ImportManager
{
    private ProductRepository $productRepository;
    private CategoryRepository $categoryRepository;
    private array $productList;
    private array $categoryList;


    public function __construct(ProductRepository $productRepository, CategoryRepository $categoryRepository)
    {
        $this->productRepository = $productRepository;
        $this->categoryRepository = $categoryRepository;
        $this->categoryList = [];
        $this->productList = [];
    }

    /*
    public function checkForCreateOrUpdate(array $productList): ?array
    {
        $updatedProductList = array();
        foreach ($productList as $product) {
            $productFromRepository = $this->productRepository->getProduct($product->getArticleNumber());
            if ($productFromRepository instanceof ProductDataTransferObject && !$this->checkForSameValues($productFromRepository, $product)) {
                $updatedProductList[] = $product;
            } elseif ($product instanceof ProductDataTransferObject && $productFromRepository === null) {
                $updatedProductList[] = $product;
            }
        }
        return $updatedProductList;
    }*/

    public function checkForValidProductSave(): ?array
    {
        $updatedProductList = [];
        foreach ($this->productList as $column) {
            $productFromRepository = $this->productRepository->getProduct($column->getArticleNumber());
            if ($productFromRepository instanceof ProductDataTransferObject && !$this->checkForProductChanges($productFromRepository, $column)) {
                $updatedProductList[] = $column;
            } elseif ($column instanceof ProductDataTransferObject && $productFromRepository === null) {
                $updatedProductList[] = $column;
            }
        }
        return $updatedProductList;
    }

    public function checkForValidCategorySave(): ?array
    {
        $updatedCategoryList = [];
        foreach ($this->categoryList as $column) {
            $categoryFromRepository = $this->categoryRepository->getCategory($column->getCategoryId());

            if ($categoryFromRepository instanceof CategoryDataTransferObject && !$this->checkForCategoryChanges($categoryFromRepository, $column)) {
                $updatedCategoryList[] = $column;
            } elseif ($column instanceof CategoryDataTransferObject && $categoryFromRepository === null) {
                $updatedCategoryList[] = $column;
            }
        }
        return $updatedCategoryList;
    }

    public function extractFromCsvDTO(array $csvList):void
    {
        $productImport = new ImportProduct();
        $categoryImport = new ImportCategory();
        foreach ($csvList as $column) {
            $category = $categoryImport->extractCategory($column);
            $product = $productImport->extractProduct($column);
            if ($category instanceof CategoryDataTransferObject) {
                $this->categoryList[] = $category;
            }
            if ($product instanceof ProductDataTransferObject) {
                $this->productList[] = $product;
            }
        }
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

    private function checkForCategoryChanges(CategoryDataTransferObject $categoryFromRepository, CategoryDataTransferObject $category):bool
    {
        if (
            $categoryFromRepository->getCategoryKey() === $category->getCategoryKey() &&
            $categoryFromRepository->getCategoryId() === $category->getCategoryId()) {
            return true;
        }
        return false;
    }
}
