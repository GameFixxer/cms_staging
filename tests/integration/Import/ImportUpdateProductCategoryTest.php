<?php
declare(strict_types=1);
namespace App\Tests\integration\Import;

use App\Client\Category\Persistence\CategoryRepository;
use App\Client\Product\Persistence\Entity\Product;
use App\Client\Product\Persistence\ProductRepository;
use App\Client\Category\Persistence\Entity\Category;
use App\Generated\CsvProductDataProvider;
use App\Service\DatabaseManager;
use App\Tests\integration\Helper\ContainerHelper;
use App\Generated\ProductDataProvider;
use Cycle\ORM\Transaction;

/**
 * @group Import
 */
class ImportUpdateProductCategoryTest extends \Codeception\Test\Unit
{
    private CsvProductDataProvider $csvDTO;
    private $importCreateProduct;
    private ProductRepository $productRepository;
    private $updateCategory;
    private CategoryRepository $categoryRepository;
    private ContainerHelper $container;

    public function _before()
    {
        $this->container = new ContainerHelper();
        $this->productRepository = $this->container->getProductRepository();
        $this->importCreateProduct = $this->container->getCreateProduct();
        $this->updateCategory = $this->container->getUpdateProductCategory();
        $this->categoryRepository = $this->container->getCategoryRepository();
    }

    public function _after()
    {
        if ($this->productRepository->getProduct($this->csvDTO->getArticleNumber()) instanceof ProductDataProvider) {
            $orm = new DatabaseManager();
            $orm = $orm->connect();
            $ormProductRepository = $orm->getRepository(Product::class);
            $transaction = new Transaction($orm);
            $transaction->delete($ormProductRepository->findOne(['article_number'=>$this->csvDTO->getArticleNumber()]));
            $transaction->run();
        }
    }

    public function testUpdateCategory()
    {
        $this->createProduct();
        $this->updateCategory->update($this->csvDTO);
        $productFromRepository = $this->productRepository->getProduct($this->csvDTO->getArticleNumber());

        self::assertNotNull($productFromRepository);
        if (!empty(($productFromRepository->getCategory()))) {
            self::assertNotSame('', $productFromRepository->getCategory()->getCategoryId());
            $orm = new DatabaseManager();
            $orm = $orm->connect();
            $ormCategoryRepository = $orm->getRepository(Category::class);

            self::assertSame($this->csvDTO->getCategoryKey(), $ormCategoryRepository->findOne(['category_key'=>$this->csvDTO->getCategoryKey()])->getCategoryKey());
            self::assertSame('', $productFromRepository->getName());
        }
    }

    public function testUpdateCategoryWithNonChangingEntry()
    {
        $this->testUpdateCategory();
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
