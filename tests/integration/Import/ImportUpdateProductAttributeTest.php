<?php
declare(strict_types=1);
namespace App\Tests\integration\Import;

use App\Client\Attribute\Persistence\Entity\Attribute;
use App\Client\Category\Persistence\CategoryEntityManagerInterface;
use App\Client\Product\Persistence\Entity\Product;
use App\Client\Product\Persistence\ProductRepository;
use App\Generated\CategoryDataProvider;
use App\Generated\CsvProductDataProvider;
use App\Generated\ProductDataProvider;
use App\Service\DatabaseManager;
use App\Tests\integration\Helper\ContainerHelper;
use Cycle\ORM\Transaction;

/**
 * @group Import4
 */
class ImportUpdateProductAttributeTest extends \Codeception\Test\Unit
{
    private CsvProductDataProvider $csvDTO;
    private $importCreateProduct;
    private ProductRepository $productRepository;
    private $updateAttribute;
    private $attributeRepository;
    private ContainerHelper $container;
    private CategoryEntityManagerInterface $categoryEntityManager;


    public function _before()
    {
        $this->container = new ContainerHelper();
        $this->productRepository = $this->container->getProductRepository();
        $this->importCreateProduct = $this->container->getCreateProduct();
        $this->updateAttribute = $this->container->getUpdateAttribute();
        $this->attributeRepository = $this->container->getAttributeRepository();
        $this->categoryEntityManager = $this->container->getCategoryEntityManager();
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

    public function testUpdateAttribute()
    {
        $this->createProduct();
        $this->updateAttribute->update($this->csvDTO);

        $productFromRepository = $this->productRepository->getProduct($this->csvDTO->getArticleNumber());

        self::assertNotNull($productFromRepository);
        $orm = new DatabaseManager();
        $orm = $orm->connect();
        $ormProductRepository = $orm->getRepository(Product::class);
        $productFromRepository2 = $ormProductRepository->select()->where('article_number', ''.$this->csvDTO->getArticleNumber())->load('attribute')->fetchAll();
        dump($productFromRepository2);
        if (!empty(($productFromRepository->getAttribute()))) {

            // self::assertNotSame('', $productFromRepository->getAttribute()->getPivot()->getAttributeId());
            $orm = new DatabaseManager();
            $orm = $orm->connect();
            $ormCategoryRepository = $orm->getRepository(Attribute::class);
            self::assertSame(
                $this->csvDTO->getAttributeKey(),
                $ormCategoryRepository->findOne(['attribute_key'=>$this->csvDTO->getAttributeKey()])->getAttributeKey()
            );
            self::assertNotNull($productFromRepository->getAttribute());
            self::assertTrue($productFromRepository->getAttribute() instanceof Attribute);
            self::assertSame(
                $productFromRepository->getAttribute()->getAttributeValue(),
                $ormCategoryRepository->findOne(['attribute_key'=>$this->csvDTO->getAttributeKey()])->getAttributeValue()
            );

            self::assertNotNull($ormCategoryRepository->findOne(['attribute_key'=>$this->csvDTO->getAttributeKey()]));
            self::assertEquals('', $productFromRepository->getName());
        }
    }

    public function testUpdateAttributeWithNonChangingEntry()
    {
        $this->testUpdateAttribute();
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
        $this->csvDTO->setAttributeKey($categoryKey);
        $this->csvDTO->setCategoryKey($categoryKey);
        $this->csvDTO->setAttributeValue($categoryKey);
        $this->csvDTO->setArticleNumber($articleNumber);
        $this->csvDTO->setCategory($this->createCategory());
        $this->csvDTO->setName('test');
    }

    private function createCategory()
    {
        $category = new CategoryDataProvider();
        $category->setCategoryKey('abc');
        return $this->categoryEntityManager->save($category);
    }
}
