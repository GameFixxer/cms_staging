<?php
namespace App\Tests\integration;

use App\Backend\ImportProduct\Business\Model\Create\Product;
use App\Backend\ImportProduct\Business\Model\Update\ProductCategory;
use App\Client\Product\Persistence\ProductRepository;
use App\Generated\Dto\CsvDataTransferObject;
use App\Generated\Dto\CsvProductDataTransferObject;
use App\Generated\Dto\ProductDataTransferObject;
use App\Service\DatabaseManager;
use App\Tests\integration\Helper\ContainerHelper;
use Cycle\ORM\Transaction;
use App\Client\Product\Persistence\Entity\Product as ProductEntity;

/**
 * @group Import2
 */

class CategorySmartyTest extends \Codeception\Test\Unit
{
    private CsvProductDataTransferObject $csvDTO;
    private $importCreateProduct;
    private ProductRepository $productRepository;
    private  $updateCategory;
    private ContainerHelper $container;

    public function _before()
    {
        $this->container = new ContainerHelper();
        $this->productRepository = $this->container->getProductRepository();
        $this->importCreateProduct = $this->container->getCreateProduct();
        $this->updateCategory = $this->container->getUpdateProductCategory();
    }

    public function _after()
    {
        if ($this->productRepository->getProduct($this->csvDTO->getArticleNumber()) instanceof ProductDataTransferObject) {
            $orm = new DatabaseManager();
            $orm = $orm->connect();
            $ormProductRepository = $orm->getRepository(ProductEntity::class);
            $transaction = new Transaction($orm);
            $transaction->delete($ormProductRepository->findOne(['article_number'=>$this->csvDTO->getArticleNumber()]));
            $transaction->run();
        }
    }

    public function testgetCategoryFromProduct()
    {
        $this->createProduct();
        $this->updateCategory->update($this->csvDTO);
        $productFromRepository = $this->productRepository->getProduct($this->csvDTO->getArticleNumber());
        self::assertSame($productFromRepository->getCategory()->getCategoryKey(), $this->csvDTO->getKey());
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
    }
}
