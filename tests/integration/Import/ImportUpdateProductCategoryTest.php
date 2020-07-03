<?php
declare(strict_types=1);
namespace App\Tests\integration\Import;

use App\Import\CreateImport\CreateProduct;

use App\Import\Update\ProductCategory;
use App\Model\CategoryRepository;
use App\Model\Dto\CsvDataTransferObject;
use App\Model\Dto\ProductDataTransferObject;
use App\Model\Entity\Category;
use App\Model\Entity\Product;
use App\Model\ProductRepository;
use App\Service\DatabaseManager;
use App\Tests\integration\Helper\ContainerHelper;
use Cycle\ORM\Transaction;

/**
 * @group Import
 */
class ImportUpdateProductCategoryTest extends \Codeception\Test\Unit
{
    private CsvDataTransferObject $csvDTO;
    private CreateProduct $importCreateProduct;
    private ProductRepository $productRepository;
    private ProductCategory $updateCategory;
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
        if ($this->productRepository->getProduct($this->csvDTO->getArticleNumber()) instanceof ProductDataTransferObject) {
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
            self::assertSame('', $productFromRepository->getProductName());
        }
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
    }
}
