<?php
declare(strict_types=1);
namespace App\Service;

use App\Model\Entity\Product;
use App\Model\Mapper\ProductImportMapper;
use League\Csv\Reader;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

class CsvImportLoader
{

    public function mapCSVToDTO(string $path): ?array
    {
        $productList = array();
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

    private function loadFromCSV(string $path) : ?object
    {
        $finder = new Finder();
        $finder->files()->name('*.csv')->in($path);
        $productList = null;
        if ($finder->hasResults()) {
            foreach ($finder as $file) {
                $csv = Reader::createFromPath($file->getPathname());
                $csv->setHeaderOffset(0);
                $productList = $csv->getRecords();
                $this->moveImportedFilesToDumper($file);
            }
        }
        return $productList;
    }

    private function moveImportedFilesToDumper(\SplFileInfo $file):void
    {
        $filesystem = new Filesystem();
        $filesystem->copy(
            '/../'.$file->getPath().'/'.$file->getFilename(),
            $file->getPath().'/../dumper/'.$file->getFilename()
        );
        $filesystem->remove('/../'.$file->getPath().'/'.$file->getFilename());
    }
}
