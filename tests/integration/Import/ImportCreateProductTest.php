<?php
declare(strict_types=1);

namespace App\Tests\integration\Import;


use App\Client\Product\Persistence\ProductRepository;

use App\Client\Product\Persistence\Entity\Product;
use App\Generated\CsvProductDataProvider;
use App\Generated\ProductDataProvider;
use App\Service\DatabaseManager;
use App\Tests\integration\Helper\ContainerHelper;
use Cycle\ORM\Transaction;

/**
 * @group Import
 */
class ImportCreateProductTest extends \Codeception\Test\Unit
{
    private CsvProductDataProvider $csvDTO;
    private $importCreateProduct;
    private ProductRepository $productRepository;
    private ContainerHelper $container;

    public function _before()
    {
        $this->container = new ContainerHelper();
        $this->productRepository = $this->container->getProductRepository();
        $this->importCreateProduct = $this->container->getCreateProduct();
    }

    public function _after()
    {
        if ($this->productRepository->get($this->csvDTO->getArticleNumber()) instanceof ProductDataProvider) {
            $orm = new DatabaseManager();
            $orm = $orm->connect();
            $ormProductRepository = $orm->getRepository(Product::class);
            $transaction = new Transaction($orm);
            $transaction->delete($ormProductRepository->findOne(['article_number'=>$this->csvDTO->getArticleNumber()]));
            $transaction->run();
        }
    }

    public function testWithNonExistingProduct()
    {
        $this->createCSVDTO('abc123');
        $csvProduct = $this->importCreateProduct->createProduct($this->csvDTO);
        $productFromRepository = $this->productRepository->get($this->csvDTO->getArticleNumber());
        self::assertNotNull($csvProduct);
        self::assertNotNull($productFromRepository);
        self::assertSame($csvProduct->getArticleNumber(), $productFromRepository->getArticleNumber());
        self::assertSame($csvProduct->getId(), $productFromRepository->getId());
    }

    public function testWithExistingCorrectProduct()
    {
        $this->createCSVDTO('abc123');
        $csvProduct1 = $this->importCreateProduct->createProduct($this->csvDTO);
        $productFromRepository1 = $this->productRepository->get($this->csvDTO->getArticleNumber());
        $csvProduct2 = $this->importCreateProduct->createProduct($this->csvDTO);
        $productFromRepository2 = $this->productRepository->get($this->csvDTO->getArticleNumber());
        self::assertNotNull($csvProduct1);
        self::assertNotNull($productFromRepository1);
        self::assertSame($csvProduct1->getArticleNumber(), $productFromRepository1->getArticleNumber());
        self::assertSame($csvProduct1->getId(), $productFromRepository1->getId());
        self::assertSame($csvProduct1->getArticleNumber(), $csvProduct2->getArticleNumber());
        self::assertSame($productFromRepository1->getArticleNumber(), $productFromRepository2->getArticleNumber());
        self::assertSame($csvProduct1->getId(), $csvProduct2->getId());
        self::assertSame($productFromRepository1->getId(), $productFromRepository2->getId());
        self::assertNotSame('test', $productFromRepository1->getName());
    }

    private function createCSVDTO(string $articleNumber)
    {
        $this->csvDTO = new CsvProductDataProvider();
        $this->csvDTO->setArticleNumber($articleNumber);
        $this->csvDTO->setPrice(1);
        $this->csvDTO->setName('test');
        $this->csvDTO->setCategoryId(0);
    }
}
