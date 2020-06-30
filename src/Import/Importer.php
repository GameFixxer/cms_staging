<?php
declare(strict_types=1);
namespace App\Import;

use App\Model\CategoryEntityManager;
use App\Model\Dto\CategoryDataTransferObject;
use App\Model\Dto\ProductDataTransferObject;
use App\Model\ProductEntityManager;

class Importer
{
    private ProductEntityManager $productEntityManager;
    private CsvImportLoader $csvLoader;
    private ImportManager $importManager;
    private CategoryEntityManager $categoryEntityManager;
    private String $path;

    public function __construct(
        ProductEntityManager $productEntityManager,
        CategoryEntityManager $categoryEntityManager,
        CsvImportLoader $csvLoader,
        ImportManager $importManager,
        string $path
    )
    {
        $this->productEntityManager = $productEntityManager;
        $this->csvLoader = $csvLoader;
        $this->importManager = $importManager;
        $this->path = $path;
        $this->categoryEntityManager = $categoryEntityManager;
    }

    /*public function import():void
    {
        $rawProductList = $this->csvLoader->mapCSVToDTO($this->path);
        if (isset($rawProductList)) {
            $productList = $this->importManager->checkForCreateOrUpdate($rawProductList);
            foreach ($productList as $product) {
                if ($product instanceof ProductDataTransferObject) {
                    $this->productEntityManager->save($product);
                }
            }
        }
    }*/
    public function import():void
    {
        $rawProductList = $this->csvLoader->mapCSVToDTO($this->path);
        if (isset($rawProductList)) {
            $this->importManager->extractFromCsvDTO($rawProductList);
            $productList = $this->importManager->checkForValidProductSave();
            foreach ($productList as $product) {
                if ($product instanceof ProductDataTransferObject) {
                    $this->productEntityManager->save($product);
                }
            }
            $categoryList = $this->importManager->checkForValidCategorySave();
            foreach ($categoryList as $category) {
                if ($category instanceof CategoryDataTransferObject) {
                    $this->categoryEntityManager->save($category);
                }
            }
        }
    }
}
