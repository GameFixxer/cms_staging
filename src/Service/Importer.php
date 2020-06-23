<?php
declare(strict_types=1);
namespace App\Service;

use App\Model\Dto\ProductDataTransferObject;
use App\Model\ProductEntityManager;
use function PHPUnit\Framework\isEmpty;

class Importer
{
    private ProductEntityManager $productEntityManager;
    private CsvImportLoader $csvLoader;
    private ImportManager $importManager;
    private String $path;

    public function __construct(ProductEntityManager $productEntityManager, CsvImportLoader $csvLoader, ImportManager $importManager, string $path)
    {
        $this->productEntityManager = $productEntityManager;
        $this->csvLoader = $csvLoader;
        $this->importManager = $importManager;
        $this->path = $path;
    }

    public function import():void
    {
        $rawProductList = $this->csvLoader->mapCSVToDTO($this->path);
        if (! isEmpty($rawProductList)) {
            $productList = $this->importManager->checkForCreateOrUpdate($rawProductList);
            foreach ($productList as $product) {
                if ($product instanceof ProductDataTransferObject) {
                    $this->productEntityManager->save($product);
                }
            }
        }
    }
}
