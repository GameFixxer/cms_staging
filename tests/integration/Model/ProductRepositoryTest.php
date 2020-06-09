<?php


namespace App\Tests\integration\Model;

use App\Model\Dto\ProductDataTransferObject;
use App\Model\Entity\Product;
use App\Model\Entity\TestEntity;
use App\Service\DatabaseManager;
use App\Tests\integration\Helper\ContainerHelper;
use Cycle\ORM\ORM;
use Cycle\ORM\Transaction;

class ProductRepositoryTest extends \Codeception\Test\Unit
{
    private ContainerHelper $container;
    private Transaction $transaction;
    private \Cycle\ORM\RepositoryInterface $ormProductRepository;
    private Product $entity;
    
    public function _before()
    {
        $this->container = new ContainerHelper();

        $databaseManager = new DatabaseManager();

        $orm = $databaseManager->connect();

        $this->ormProductRepository =  $orm->getRepository(Product::class);

        $this->transaction = new Transaction($orm);
        $this->transaction->persist($this->createProductEntity());
        $this->transaction->run();
    }

    public function _after()
    {
        if ($this->ormProductRepository->findByPK($this->entity->getId()) instanceof Product) {
            $this->transaction->delete($this->ormProductRepository->findByPK($this->entity->getId()));
            $this->transaction->run();
        }
    }

    public function testGetProductWithExistingProduct()
    {
        $productRepository = $this->container->getProductRepository();

        $productDtoFromRepository = $productRepository->getProduct($this->entity->getId());

        $this->assertSame($this->entity->getName(), $productDtoFromRepository->getProductName());
        $this->assertSame($this->entity->getDescription(), $productDtoFromRepository->getProductDescription());
        $this->assertSame($this->entity->getId(), $productDtoFromRepository->getProductId());
    }

    public function testGetProductWithNonExistingProduct()
    {
        $productRepository = $this->container->getProductRepository();

        $this->assertNull($productRepository->getProduct(0));
    }

    public function testGetLastProductOfProductListWithNonEmptyDatabase()
    {
        $productRepository = $this->container->getProductRepository();

        $productListFromProductRepository = $productRepository->getProductList();

        $lastProductOfProductRepositoryList = end($productListFromProductRepository);

        $this->assertSame($this->entity->getName(), $lastProductOfProductRepositoryList ->getProductName());
        $this->assertSame($this->entity->getDescription(), $lastProductOfProductRepositoryList ->getProductDescription());
        $this->assertSame($this->entity->getId(), $lastProductOfProductRepositoryList ->getProductId());
    }

    public function testGetProductListWithEmptyDatabase()
    {
        $databaseManager = new DatabaseManager();
        $orm = $databaseManager->connect();
        $productRepository = $this->container->getProductRepository();

        $productRepository->setOrmProductRepositoryForTesting($orm, TestEntity::class);
        $this->assertEmpty($productRepository->getProductList());

    }

    private function createProductEntity() :Product
    {
        $this->entity = new Product();
        $this->entity->setName('fucking neighour');
        $this->entity->setDescription('ich leg dir eine vardammte Rohrbombe in den Garten, wenn du nicht endlich ruhig bist!!!!');

        return $this->entity;
    }
}
