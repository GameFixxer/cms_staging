<?php
declare(strict_types=1);
namespace App\Tests\integration\Import;

use App\Client\Category\Persistence\CategoryEntityManagerInterface;
use App\Client\Category\Persistence\CategoryRepository;
use App\Client\Product\Persistence\Entity\Product;
use App\Client\Product\Persistence\ProductRepository;
use App\Client\Category\Persistence\Entity\Category;
use App\Generated\CategoryDataProvider;
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
    private CategoryEntityManagerInterface $categoryEntityManager;

    public function _before()
    {
        $this->container = new ContainerHelper();
        $this->productRepository = $this->container->getProductRepository();
        $this->importCreateProduct = $this->container->getCreateProduct();
        $this->updateCategory = $this->container->getUpdateProductCategory();
        $this->categoryRepository = $this->container->getCategoryRepository();
        $this->categoryEntityManager = $this->container->getCategoryEntityManager();
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

    public function testUpdateCategory()
    {
        $this->createProduct();
        $this->updateCategory->update($this->csvDTO);
        $productFromRepository = $this->productRepository->get($this->csvDTO->getArticleNumber());

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
        $this->csvDTO->setPrice(1);
        $this->csvDTO->setName('test');
        $this->csvDTO->setCategory($this->createCategory());
        $this->csvDTO->setCategoryId(  $this->csvDTO->getCategory()->getCategoryId());
        codecept_debug( $this->csvDTO->getCategory()->getCategoryId());
    }
    private function createCategory()
    {
        $category = new CategoryDataProvider();
        $category->setCategoryKey('abc');
        return $this->categoryEntityManager->save($category);
    }
}
