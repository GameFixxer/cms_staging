<?php
declare(strict_types=1);

namespace App\Tests\integration\Import;

use App\Import\CreateImport\CreateProduct;
use App\Import\Update\ProductInformation;
use App\Model\Dto\CsvDataTransferObject;
use App\Model\Dto\ProductDataTransferObject;
use App\Model\Entity\Product;
use App\Model\ProductRepository;
use App\Service\DatabaseManager;
use App\Tests\integration\Helper\ContainerHelper;
use Cycle\ORM\Transaction;

/**
 * @group Import
 */
class ImportUpdateProductInformationTest extends \Codeception\Test\Unit
{
    private CsvDataTransferObject $csvDTO;
    private CreateProduct $importCreateProduct;
    private ProductRepository $productRepository;
    private ContainerHelper $container;
    private ProductInformation $updateProductInfo;

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
            $ormProductRepository = $orm->getRepository(Product::class);
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
        self::assertSame($csvProduct->getProductId(), $productFromRepository->getProductId());
        self::assertSame($csvProduct->getProductName(), $productFromRepository->getProductName());
        self::assertSame($csvProduct->getProductDescription(), $productFromRepository->getProductDescription());
    }

    private function createProduct()
    {
        $tmp = rand(1, 1000).substr('', rand(1, 1000));
        $this->createCSVDTO(''.$tmp, 'tester');
        $csvProduct = $this->importCreateProduct->createProduct($this->csvDTO);
        $this->csvDTO->setProductId($csvProduct->getProductId());
    }

    private function createCSVDTO(string $articleNumber, string $categoryKey)
    {
        $this->csvDTO = new CsvDataTransferObject();
        $this->csvDTO->setCategoryKey($categoryKey);
        $this->csvDTO->setArticleNumber($articleNumber);
        $this->csvDTO->setProductName('test');
        $this->csvDTO->setProductDescription('descriptiontest');
    }
}
