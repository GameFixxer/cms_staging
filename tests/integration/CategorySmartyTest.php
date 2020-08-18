<?php
declare(strict_types=1);
namespace App\Tests\integration;

use App\Client\Product\Persistence\ProductRepository;
use App\Generated\CsvProductDataProvider;
use App\Generated\ProductDataProvider;
use App\Service\DatabaseManager;
use App\Tests\integration\Helper\ContainerHelper;
use Cycle\ORM\Transaction;
use App\Client\Product\Persistence\Entity\Product as ProductEntity;

/**
 * @group Import2
 */

class CategorySmartyTest extends \Codeception\Test\Unit
{
    private CsvProductDataProvider $csvDTO;
    private $importCreateProduct;
    private ProductRepository $productRepository;
    private $updateCategory;
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
        if ($this->productRepository->get($this->csvDTO->getArticleNumber()) instanceof ProductDataProvider) {
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
        $productFromRepository = $this->productRepository->get($this->csvDTO->getArticleNumber());
        self::assertSame($productFromRepository->getCategory()->getCategoryKey(), $this->csvDTO->getCategoryKey());
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
        $this->csvDTO = new CsvProductDataProvider();
        $this->csvDTO->setCategoryKey($categoryKey);
        $this->csvDTO->setArticleNumber($articleNumber);
        $this->csvDTO->setName('test');
    }
}
