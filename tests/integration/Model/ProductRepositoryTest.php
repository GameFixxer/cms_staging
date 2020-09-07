<?php


namespace App\Tests\integration\Model;


use App\Client\Product\Persistence\Entity\Product;
use App\Service\DatabaseManager;
use App\Tests\integration\Helper\ContainerHelper;


/**
 * @group model
 */


class ProductRepositoryTest extends \Codeception\Test\Unit
{
    private ContainerHelper $container;

    private Product $entity;
    
    public function _before()
    {
        $this->container = new ContainerHelper();

        $databaseManager = new DatabaseManager();

        $orm = $databaseManager->connect();


    }

    public function _after()
    {
    }

    public function testGetProductWithExistingProduct()
    {
        $productRepository = $this->container->getProductRepository();

        $productDtoFromRepository = $productRepository->get($this->entity->getArticleNumber());
        $this->assertSame($this->entity->getName(), $productDtoFromRepository->getName());
        $this->assertSame($this->entity->getDescription(), $productDtoFromRepository->getDescription());
        $this->assertSame($this->entity->getId(), $productDtoFromRepository->getId());


    }

    public function testGetProductWithNonExistingProduct()
    {
        $productRepository = $this->container->getProductRepository();

        $this->assertNull($productRepository->get(0));
    }

    public function testGetLastProductOfProductListWithNonEmptyDatabase()
    {
        $productRepository = $this->container->getProductRepository();
        /*
                $productListFromProductRepository = $productRepository->getList();

                $lastProductOfProductRepositoryList = end($productListFromProductRepository);

                $this->assertSame($this->entity->getProductName(), $lastProductOfProductRepositoryList ->getName());
                $this->assertSame($this->entity->getProductDescription(), $lastProductOfProductRepositoryList ->getDescription());
                $this->assertSame($this->entity->getId(), $lastProductOfProductRepositoryList ->getId());*/
        self::assertNotNull($productRepository->getList());
    }

    private function createProductEntity() :Product
    {
        $this->entity = new Product();
        $this->entity->setName('fucking neighour');
        $this->entity->setDescription('a very noisy neighbour');
        $this->entity->setArticleNumber($this->container->createArticleNumber());
        $this->entity->setCategoryId(null);
        $this->entity->setPrice(0);

        return $this->entity;
    }
}
