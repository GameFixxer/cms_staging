<?php
declare(strict_types=1);

namespace App\Tests\integration\Import;


use App\Model\Dto\CsvDataTransferObject;
use App\Model\Dto\ProductDataTransferObject;
use App\Model\Entity\Product;
use App\Model\ProductRepository;
use App\Service\DatabaseManager;
use App\Tests\integration\Helper\ContainerHelper;
use App\Import\Create\Product as CreateProduct;
use Cycle\ORM\Transaction;

/**
 * @group Import
 */
class ImportCreateProductTest extends \Codeception\Test\Unit
{
    private CsvDataTransferObject $csvDTO;
    private CreateProduct $importCreateProduct;
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
        if ($this->productRepository->getProduct($this->csvDTO->getArticleNumber()) instanceof ProductDataTransferObject) {
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
        $productFromRepository = $this->productRepository->getProduct($this->csvDTO->getArticleNumber());
        self::assertNotNull($csvProduct);
        self::assertNotNull($productFromRepository);
        self::assertSame($csvProduct->getArticleNumber(), $productFromRepository->getArticleNumber());
        self::assertSame($csvProduct->getProductId(), $productFromRepository->getProductId());
    }

    public function testWithExistingCorrectProduct()
    {
        $this->createCSVDTO('abc123');
        $csvProduct1 = $this->importCreateProduct->createProduct($this->csvDTO);
        $productFromRepository1 = $this->productRepository->getProduct($this->csvDTO->getArticleNumber());
        $csvProduct2 = $this->importCreateProduct->createProduct($this->csvDTO);
        $productFromRepository2 = $this->productRepository->getProduct($this->csvDTO->getArticleNumber());
        self::assertNotNull($csvProduct1);
        self::assertNotNull($productFromRepository1);
        self::assertSame($csvProduct1->getArticleNumber(), $productFromRepository1->getArticleNumber());
        self::assertSame($csvProduct1->getProductId(), $productFromRepository1->getProductId());
        self::assertSame($csvProduct1->getArticleNumber(), $csvProduct2->getArticleNumber());
        self::assertSame($productFromRepository1->getArticleNumber(), $productFromRepository2->getArticleNumber());
        self::assertSame($csvProduct1->getProductId(), $csvProduct2->getProductId());
        self::assertSame($productFromRepository1->getProductId(), $productFromRepository2->getProductId());
        self::assertNotSame('test', $productFromRepository1->getProductName());
    }

    private function createCSVDTO(string $articleNumber)
    {
        $this->csvDTO = new CsvDataTransferObject();
        $this->csvDTO->setArticleNumber($articleNumber);
        $this->csvDTO->setProductName('test');
    }
}
