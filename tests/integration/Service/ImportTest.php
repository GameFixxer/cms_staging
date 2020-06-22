<?php
namespace App\Tests\integration\Service;

use App\Model\ProductEntityManager;
use App\Model\ProductRepository;
use App\Service\CsvImportLoader;
use App\Service\Importer;

use App\Tests\integration\Helper\ContainerHelper;
use Symfony\Component\Filesystem\Filesystem;
use UnitTester;

class ImportTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester $tester
     */
    protected UnitTester $tester;

    protected ContainerHelper $container;
    protected ProductRepository $productRepository;
    protected ProductEntityManager $productEntityManager;
    protected Importer $importer;
    protected CsvImportLoader $csvLoader;
    protected String $path;

    protected function _before()
    {
        $this->container = new ContainerHelper();
        $this->productRepository = $this->container->getProductRepository();
        $this->productEntityManager = $this->container->getProductEntityManager();
        $this->csvLoader = $this->container->getCsvImportLoader();
        $this->path = dirname(__DIR__, 3).'/import/test/';
        $this->importer = new Importer(
            $this->productEntityManager,
            $this->csvLoader,
            $this->container->getImportManager(),
            $this->path
        );
        $rawProductList = $this->csvLoader->mapCSVToDTO($this->path);
        if ($rawProductList !== null) {
            $this->deleteTestArticleFromDB($rawProductList);
        }
        $this->setBackFiles();
    }

    protected function _after()
    {
        parent::_after();
        unset($_SERVER['REQUEST_METHOD']);
        $this->setBackFiles();
        $rawProductList = $this->csvLoader->mapCSVToDTO($this->path);
        if ($rawProductList !== null) {
            $this->deleteTestArticleFromDB($rawProductList);
        }
        $this->setBackFiles();
    }

    // tests
    public function testProductImportNewProduct(): void
    {
        $importList = $this->csvLoader->mapCSVToDTO($this->path);
        $this->setBackFiles();
        $this->importer->import();
        foreach ($importList as $product) {
            $productFromRepository = $this->productRepository->getProduct($product->getArticleNumber());
            if ($productFromRepository !== null) {
                $this->assertEquals($product->getProductName(), $productFromRepository->getProductName());
                $this->assertEquals($product->getProductDescription(), $productFromRepository->getProductDescription());
            }
        }
    }


    public function deleteTestArticleFromDB(array $testArticleList)
    {
        foreach ($testArticleList as $product) {
            if ($this->productRepository->getProduct($product->getArticleNumber()) !== null) {
                $this->productEntityManager->delete($product);
            }
        }
    }

    private function setBackFiles()
    {
        $filesystem = new Filesystem();
        $filesystem->copy(
            dirname(__DIR__, 3).'/import/dumper/test_product_abstract.csv',
            dirname(__DIR__, 3).'//import/test/test_product_abstract.csv'
        );
        $filesystem->remove(dirname(__DIR__, 3).'/import/dumper/test_product_abstract.csv');
    }
}
