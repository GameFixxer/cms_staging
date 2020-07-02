<?php
declare(strict_types=1);

namespace App\Import;

use App\Import\CreateImport\CreateProductInterface;
use App\Import\UpdateImport\UpdateImportInterface;

class Importer
{
    private CsvImportLoaderInterface $csvLoader;
    private CreateProductInterface $createProduct;
    private UpdateImportInterface $updateImport;
    private string $path;

    public function __construct(
        CsvImportLoaderInterface $csvLoader,
        CreateProductInterface $createProduct,
        UpdateImportInterface $updateImport,
        string $path
    ) {
        $this->csvLoader = $csvLoader;
        $this->createProduct = $createProduct;
        $this->updateImport = $updateImport;
        $this->path = $path;
    }

    public function import(): void
    {
        $rawProductList = $this->csvLoader->mapCSVToDTO($this->path);
        if (isset($rawProductList)) {
            foreach ($rawProductList as $object) {
                $updatedDTO = $this->createProduct->createProduct($object);
                $this->updateImport->updateProducts($updatedDTO);
            }
        }
    }
}
