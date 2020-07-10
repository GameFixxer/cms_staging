<?php
declare(strict_types=1);

namespace App\Backend\ImportProduct\Business\Model;

use App\Backend\ImportComponent\Loader\CsvImportLoaderInterface;
use App\Backend\ImportProduct\Business\Model\Create\ProductInterface;
use App\Backend\ImportProduct\Business\Model\Update\UpdateInterface;
use App\Generated\Dto\CsvProductDataTransferObject;


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
                if ($updatedDTO instanceof CsvProductDataTransferObject) {
                    $this->updateImport->performUpdateActions($updatedDTO);
                }
            }
        }
    }
}
