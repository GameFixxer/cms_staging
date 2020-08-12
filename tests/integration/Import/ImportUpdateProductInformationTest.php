<?php
declare(strict_types=1);

namespace App\Tests\integration\Import;

use App\Backend\ImportProduct\Business\Model\Create\Product as ProductImport;
use App\Backend\ImportProduct\Business\Model\Update\ProductInformation;
use App\Client\Product\Persistence\ProductRepository;
use App\Client\Product\Persistence\Entity\Product as ProductEntity;
use App\Generated\Dto\CsvProductDataTransferObject;
use App\Generated\Dto\ProductDataTransferObject;
use App\Service\DatabaseManager;
use App\Tests\integration\Helper\ContainerHelper;
use Cycle\ORM\Transaction;

/**
 * @group Import
 */
class ImportUpdateProductInformationTest extends \Codeception\Test\Unit
{
    private CsvProductDataTransferObject $csvDTO;
    private $importCreateProduct;
    private ProductRepository $productRepository;
    private ContainerHelper $container;
    private $updateProductInfo;

    public function _before()
    {
        $this->container = new ContainerHelper();
        $this->productRepository = $this->container->getProductRepository();
        $this->importCreateProduct = $this->container->getCreateProduct();
        $this->updateProductInfo = $this->container->getUpdateProductInformation();
    }

    public function _after()
    {
        if ($this->productRepository->getProduct($this->csvDTO->getArticleNumber()) instanceof ProductDataTransferObject) {
            $orm = new DatabaseManager();
            $orm = $orm->connect();
            $ormProductRepository = $orm->getRepository(ProductEntity::class);
            $transaction = new Transaction($orm);
            $transaction->delete($ormProductRepository->findOne(['article_number' => $this->csvDTO->getArticleNumber()]));
            $transaction->run();
        }
    }

    public function testProductInformationUpdate()
    {
        $this->createProduct();
        $csvProduct = $this->importCreateProduct->createProduct($this->csvDTO);
        $this->updateProductInfo->update($csvProduct);

        $productFromRepository = $this->productRepository->getProduct($this->csvDTO->getArticleNumber());
        self::assertNotNull($csvProduct);
        self::assertNotNull($productFromRepository);
        self::assertSame($csvProduct->getArticleNumber(), $productFromRepository->getArticleNumber());
        self::assertSame($csvProduct->getId(), $productFromRepository->getId());
        self::assertSame($csvProduct->getName(), $productFromRepository->getName());
        self::assertSame($csvProduct->getDescription(), $productFromRepository->getDescription());
    }

    private function createProduct()
    {
        $tmp = rand(1, 1000).substr('', rand(1, 1000));
        $this->createCSVDTO(''.$tmp, 'tester');
        $csvProduct = $this->importCreateProduct->createProduct($this->csvDTO);
        $this->csvDTO->setId($csvProduct->getId());
    }

    private function createCSVDTO(string $articleNumber, string $categoryKey)
    {
        $this->csvDTO = new CsvProductDataTransferObject();
        $this->csvDTO->setKey($categoryKey);
        $this->csvDTO->setArticleNumber($articleNumber);
        $this->csvDTO->setName('test');
        $this->csvDTO->setDescription('descriptiontest');
    }
}
