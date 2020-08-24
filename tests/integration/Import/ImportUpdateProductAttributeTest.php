<?php
declare(strict_types=1);
namespace App\Tests\integration\Import;

use App\Client\Attribute\Persistence\Entity\Attribute;
use App\Client\Category\Persistence\CategoryEntityManagerInterface;
use App\Client\Product\Persistence\Entity\Product;
use App\Client\Product\Persistence\ProductRepository;
use App\Generated\AttributeDataProvider;
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
    private $attributeBusinessFacade;
    private ContainerHelper $container;
    private CategoryEntityManagerInterface $categoryEntityManager;


    public function _before()
    {
        $this->container = new ContainerHelper();
        $this->productRepository = $this->container->getProductRepository();
        $this->importCreateProduct = $this->container->getCreateProduct();
        $this->updateAttribute = $this->container->getUpdateAttribute();
        $this->attributeBusinessFacade = $this->container->getAttributeBusinessFacade();
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

    public function testUpdateAttribute()
    {
        $this->createProduct();
        $this->updateAttribute->update($this->csvDTO);

        $productFromRepository = $this->productRepository->get($this->csvDTO->getArticleNumber());

        self::assertNotNull($productFromRepository);
        $orm = new DatabaseManager();
        $orm = $orm->connect();
        $ormProductRepository = $orm->getRepository(Product::class);
        if (!empty(($productFromRepository->getAttribute()))) {
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
                $productFromRepository->getAttribute()[0]->getAttributeValue(),
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
        $attribute =  $this->createAttribute();
        $this->csvDTO->setAttribute([$attribute]);
        $this->csvDTO->setAttributeKey($attribute->getAttributeKey());
        $this->csvDTO->setCategoryKey($categoryKey);
        $this->csvDTO->setAttributeValue($attribute->getAttributeValue());
        $this->csvDTO->setArticleNumber($articleNumber);
        $this->csvDTO->setCategory($this->createCategory());
        $this->csvDTO->setPrice(1);
        $this->csvDTO->setName('test');
        $this->csvDTO->setCategoryId($this->csvDTO->getCategory()->getCategoryId());
        $this->csvDTO->setAttributeId($attribute->getAttributeId());
    }

    private function createCategory()
    {
        $category = new CategoryDataProvider();
        $category->setCategoryKey('abc');
        return $this->categoryEntityManager->save($category);
    }
    
    private function createAttribute()
    {
        $attribute = new AttributeDataProvider();
        $attribute->setAttributeKey('test');
        $attribute->setAttributeValue('testattribute');
        return $this->attributeBusinessFacade->save($attribute);
    }
}
