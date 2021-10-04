<?php
declare(strict_types=1);

namespace App\Tests\integration\Import;

use App\Client\Product\Persistence\ProductRepository;

use App\Client\Product\Persistence\Entity\Product;
use App\Generated\Dto\CsvProductDataTransferObject;
use App\Generated\Dto\ProductDataTransferObject;
use App\Service\DatabaseManager;
use App\Tests\integration\Helper\ContainerHelper;
use App\Backend\ImportProduct\Business\Model\Create\Product as CreateProduct;
use Cycle\ORM\Transaction;

/**
 * @group Import
 */
class ImportCreateProductTest extends \Codeception\Test\Unit
{
    private CsvProductDataTransferObject $csvDTO;
    private CreateProduct $importCreateProduct;
    private ProductRepository $productRepository;

    public function _before()
    {
        $container = new ContainerHelper();
        $this->productRepository = $container->getProductRepository();
        $this->importCreateProduct = $container->getCreateProduct();
    }

    public function _after()
    {
        if ($this->productRepository->getProduct($this->csvDTO->getArticleNumber()) instanceof ProductDataTransferObject) {
            $orm = DatabaseManager::connect();
            $ormProductRepository = $orm->getRepository(Product::class);
            $transaction = new Transaction($orm);
            $transaction->delete($ormProductRepository->findOne(['article_number'=>$this->csvDTO->getArticleNumber()]));
            $transaction->run();
        }
    }

    public function testWithNonExistingProduct(): void
    {
        $this->createCSVDTO('abc123');
        $csvProduct = $this->importCreateProduct->createProduct($this->csvDTO);
        $productFromRepository = $this->productRepository->getProduct($this->csvDTO->getArticleNumber());
        self::assertNotNull($csvProduct);
        self::assertNotNull($productFromRepository);
        self::assertSame($csvProduct->getArticleNumber(), $productFromRepository->getArticleNumber());
        self::assertSame($csvProduct->getId(), $productFromRepository->getId());
    }

    public function testWithExistingCorrectProduct(): void
    {
        $this->createCSVDTO('abc123');
        $csvProduct1 = $this->importCreateProduct->createProduct($this->csvDTO);
        $productFromRepository1 = $this->productRepository->getProduct($this->csvDTO->getArticleNumber());
        $csvProduct2 = $this->importCreateProduct->createProduct($this->csvDTO);
        $productFromRepository2 = $this->productRepository->getProduct($this->csvDTO->getArticleNumber());
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

    private function createCSVDTO(string $articleNumber): void
    {
        $this->csvDTO = new CsvProductDataTransferObject();
        $this->csvDTO->setArticleNumber($articleNumber);
        $this->csvDTO->setName('test');
    }
}
