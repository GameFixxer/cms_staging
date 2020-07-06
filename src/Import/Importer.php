<?php
declare(strict_types=1);

namespace App\Import;

use App\Import\Create\ProductInterface;
use App\Import\Update\UpdateInterface;
use App\Model\Dto\CsvDataTransferObject;

class Importer
{
    private CsvImportLoaderInterface $csvLoader;
    private ProductInterface $createProduct;
    private UpdateInterface $updateImport;
    private string $path;

    public function __construct(
        CsvImportLoaderInterface $csvLoader,
        ProductInterface $createProduct,
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
