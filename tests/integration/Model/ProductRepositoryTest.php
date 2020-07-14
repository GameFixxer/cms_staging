<?php


namespace App\Tests\integration\Model;

use App\Client\Product\Persistence\Entity\TestEntity;
use App\Client\Product\Persistence\Mapper\ProductMapper;
use App\Client\Product\Persistence\ProductRepository;
use App\Client\Product\Persistence\Entity\Product;
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

        $this->ormProductRepository = $orm->getRepository(Product::class);

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

        $productDtoFromRepository = $productRepository->getProduct($this->entity->getArticleNumber());

        $this->assertSame($this->entity->getProductName(), $productDtoFromRepository->getName());
        $this->assertSame($this->entity->getProductDescription(), $productDtoFromRepository->getDescription());
        $this->assertSame($this->entity->getId(), $productDtoFromRepository->getId());
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

        $this->assertSame($this->entity->getProductName(), $lastProductOfProductRepositoryList ->getName());
        $this->assertSame($this->entity->getProductDescription(), $lastProductOfProductRepositoryList ->getDescription());
        $this->assertSame($this->entity->getId(), $lastProductOfProductRepositoryList ->getId());
    }

    private function createProductEntity() :Product
    {
        $this->entity = new Product();
        $this->entity->setProductName('fucking neighour');
        $this->entity->setProductDescription('a very noisy neighbour');
        $this->entity->setArticleNumber($this->container->createArticleNumber());
        $this->entity->setCategory(null);

        return $this->entity;
    }
}
