<?php
namespace App\Tests\integration\Service;

use App\Import\CsvImportLoader;
use App\Import\Importer;
use App\Import\MappingAssistant;
use App\Model\Entity\Product;
use App\Model\ProductEntityManager;
use App\Model\ProductRepository;
use App\Tests\integration\Helper\ContainerHelper;
use Symfony\Component\Filesystem\Filesystem;
use UnitTester;

/**
 * @group MapperTest
 */

class MappingAssistantTest extends \Codeception\Test\Unit
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
    protected Filesystem $filesystem;

    protected function _before()
    {
        $this->filesystem = new Filesystem();
        $this->container = new ContainerHelper();
        $this->csvLoader = $this->container->getCsvImportLoader();

        $this->path = dirname(__DIR__, 3).'/import/dynamicMappingTest/';
    }

    protected function _after()
    {
        $this->setBackFiles('/import/dumper/test_product_abstract.csv','/import/dynamicMappingTest/test_product_abstract.csv');
    }

    // tests
    public function testMapping(): void
    {
        $this->csvLoader->loadFromCSV($this->path);
        $mappingAssistant = new MappingAssistant();

        $resultList = $mappingAssistant->createMappingList2($this->csvLoader->getHeader());
        dump($resultList);




    }

    private function setBackFiles(string $origin, string $target)
    {
        $this->filesystem->copy(
            dirname(__DIR__, 3).$origin,
            dirname(__DIR__, 3).$target
        );
        $this->filesystem->remove(dirname(__DIR__, 3).$origin);
    }
}
