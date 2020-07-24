<?php
namespace App\Tests\integration;

use App\Client\Attribute\Persistence\Entity\Attribute;
use App\Tests\integration\Helper\ContainerHelper;
use App\Client\Product\Persistence\Entity\Product;
use Cycle\ORM\Transaction;
use Spiral\Database;
use Cycle\ORM;
use Cycle\Annotated;
use Cycle\Schema as CycleSchema;

/**
 * @group cycle
 */

class CycleOrmTest extends \Codeception\Test\Unit
{
    private \Cycle\ORM\RepositoryInterface $ormProductRepository;
    private \Cycle\ORM\RepositoryInterface $ormAttributeRepository;
    private ContainerHelper $container;
    private Product $product;
    private $orm;

    public function _before()
    {
        $this->container = new ContainerHelper();
        $this->orm = $this->container->getOrmProductRepository();
        $this->ormProductRepository = $this->orm->getRepository(Product::class);
        $this->ormAttributeRepository = $this->orm->getRepository(Attribute::class);
        $this->createProduct();
        $transaction = new Transaction($this->orm);
        $transaction->persist($this->product);
        $transaction->run();
    }

    public function _after()
    {
    }

    public function testGetAttributeInProduct()
    {
        $productEntity = $this->ormProductRepository->findOne(['article_Number'=>$this->product->getArticleNumber()]);
        self::assertNotNull($productEntity);
        self::assertSame($productEntity->getProductName(), $this->product->getProductName());
        self::assertSame($productEntity->getProductDescription(), $this->product->getProductDescription());
        self::assertSame($productEntity->getAttribute(), $this->product->getAttribute());
    }

    public function testORMFunctionality()
    {
        $this->createProduct();
        $transaction = new Transaction($this->orm);
    }

    private function createProduct()
    {
        $tmp = rand(1, 1000).substr('', rand(1, 1000));
        $this->createProductEntity(''.$tmp);
    }

    private function createProductEntity(string $articleNumber)
    {
        $attribute = new Attribute();
        $attribute->setAttributeKey('tester');
        $attribute->setAttributeValue('attributtest');
        $transaction = new Transaction($this->orm);
        $transaction->persist($attribute);
        $transaction->run();
        $this->product = new Product();
        $this->product->setArticleNumber($articleNumber);
        $this->product->addAttribute($attribute);
        $this->product->setProductName('productname');
        $this->product->setProductDescription('productdescription');
    }
}
