<?php

namespace App\Service;

use App\Model\Entity\Product;
use App\Model\Mapper\ProductImportMapper;
use App\Model\ProductRepository;
use League\Csv\Reader;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;
use App\Model\Dto\ProductDataTransferObject;
use App\Model\ProductEntityManager;

class Importer
{
    private ProductEntityManager $productEntityManager;
    private ProductRepository $productRepository;
    private String $path;

    public function __construct(ProductEntityManager $productEntityManager, ProductRepository $productRepository, string $path)
    {
        $this->productEntityManager = $productEntityManager;
        $this->productRepository = $productRepository;
        $this->path = $path;
    }

    public function import():void
    {
        $rawProductList = $this->mapCSVToDTO();
        if ($rawProductList !== null) {
            $productList = $this->checkForCreateOrUpdate($rawProductList);
            foreach ($productList as $product) {
                if ($product instanceof ProductDataTransferObject) {
                    $this->productEntityManager->save($product);
                }
            }
        }
    }

    public function loadFromCSV() : ?object
    {
        $finder = new Finder();
        $finder->files()->name('*.csv')->in($this->path);
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

    /**
     * @return ProductDataTransferObject[]
     */
    public function mapCSVToDTO(): ?array
    {
        $productList = array();
        $objects = $this->loadFromCSV();

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
    private function checkForCreateOrUpdate(array $productList): ?array
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
    }

    private function checkForSameValues(ProductDataTransferObject $productFromRepository, ProductDataTransferObject $product):bool
    {
        if (
            $productFromRepository->getProductName() === $product->getProductName() &&
            $productFromRepository->getProductDescription() === $product->getProductDescription()) {
            return true;
        }
        return false;
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
