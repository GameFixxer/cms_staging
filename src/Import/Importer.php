<?php
declare(strict_types=1);
namespace App\Import;

class Importer
{
    private CsvImportLoader $csvLoader;
    private ImportCategory $importCategory;
    private ImportProduct $importProduct;
    private String $path;

    public function __construct(
        CsvImportLoader $csvLoader,
        ImportCategory $importCategory,
        ImportProduct $importProduct,
        string $path
    ) {
        $this->csvLoader = $csvLoader;
        $this->importCategory = $importCategory;
        $this->importProduct = $importProduct;
        $this->path = $path;
    }

    public function import():void
    {
        $rawProductList = $this->csvLoader->mapCSVToDTO($this->path);
        if (isset($rawProductList)) {
            foreach ($rawProductList as $object) {
                $this->importCategory->importCategory($object);
                $this->importProduct->importProduct($object);
            }
        }
    }
}
