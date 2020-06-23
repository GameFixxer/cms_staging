<?php
declare(strict_types=1);
namespace App\Service;

use App\Model\Entity\Product;
use App\Model\Mapper\ProductImportMapper;
use League\Csv\Reader;

class CsvImportLoader
{
    public function mapCSVToDTO(string $path): array
    {
        $productList  = [];
        $objects = $this->loadFromCSV($path);

        $productMapper = new ProductImportMapper();

        foreach ($objects as $product) {
            $productEntity = new Product();
            $productEntity->setDescription($product['description.de_DE']);
            $productEntity->setName($product['name.de_DE']);
            $productEntity->setArticleNumber($product['sku']);
            $productList[] = $productMapper->map($productEntity);
        }
        return $productList;
    }

    private function loadFromCSV(string $path) : ?\Iterator
    {
        $fileFinder = new  FileManager();
        $finder = $fileFinder->getFiles($path);
        $productList = null;
        foreach ($finder as $file) {
            $csv = Reader::createFromPath($file->getPathname());
            $csv->setHeaderOffset(0);
            $productList = $csv->getRecords();
            $fileFinder->moveImportedFilesToDumper($file);
        }
        return $productList;
    }
}
