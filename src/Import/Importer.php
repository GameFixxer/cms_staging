<?php
declare(strict_types=1);

namespace App\Import;

use App\Import\CreateImport\CreateProductInterface;
use App\Import\Update\ProductInterface;
use App\Import\Update\UpdateInterface;
use App\Model\Dto\CsvDataTransferObject;

class Importer
{
    private CsvImportLoaderInterface $csvLoader;
    private CreateProductInterface $createProduct;
    private UpdateInterface $updateImport;
    private string $path;

    public function __construct(
        CsvImportLoaderInterface $csvLoader,
        CreateProductInterface $createProduct,
        UpdateInterface $updateImport,
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
                if ($updatedDTO instanceof CsvDataTransferObject) {
                    $this->updateImport->performUpdateActions($updatedDTO);
                }
            }
        }
    }
}
