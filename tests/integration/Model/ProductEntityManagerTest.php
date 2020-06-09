<?php


namespace App\Tests\integration\Model;

use App\Model\Dto\ProductDataTransferObject;
use App\Model\ProductEntityManager;
use App\Service\DatabaseManager;
use App\Tests\integration\Helper\ContainerHelper;
use Cycle\ORM\Transaction;
use App\Model\Entity\Product;

/**
 * @group ProductEntityManagerTest
 */

class ProductEntityManagerTest extends \Codeception\Test\Unit
{
    private ProductDataTransferObject $productDto;
    private ContainerHelper $container;
    private ProductEntityManager $productEntityManager;

    public function _before()
    {
        $this->container = new ContainerHelper();
        $this->productEntityManager = $this->container->getProductEntityManager();
        $this->createDto('fu', 'ba');
    }

    public function _after()
    {
        $orm = new DatabaseManager();
        $orm = $orm->connect();
        $ormProductRepository = $orm->getRepository(Product::class);
        $transaction = new Transaction($orm);
        $transaction->delete($ormProductRepository->findByPK($this->productDto->getProductId()));
        $transaction->run();
    }

    public function testCreateProduct()
    {
        $createdProduct = $this->productEntityManager->save($this->productDto);

        $productFromRepository =  $this->container->getProductRepository()->getProduct($this->productDto->getProductId());

        $this->assertSame($this->productDto->getProductName(), $productFromRepository->getProductName());
        $this->assertSame($this->productDto->getProductDescription(), $productFromRepository->getProductDescription());
        $this->assertSame($this->productDto->getProductId(), $productFromRepository->getProductId());

        return $createdProduct;
    }

    public function testUpdateProduct()
    {
        $this->productDto = $this->testCreateProduct();

        $this->productDto->setProductName('fabulous');
        $this->productDto->setProductDescription('even more fabulous');
        $this->productDto = $this->productEntityManager->save($this->productDto);
        $productFromRepository =  $this->container->getProductRepository()->getProduct($this->productDto->getProductId());

        $this->assertSame($this->productDto->getProductName(), $productFromRepository->getProductName());
        $this->assertSame($this->productDto->getProductDescription(), $productFromRepository->getProductDescription());
        $this->assertSame($this->productDto->getProductId(), $productFromRepository->getProductId());
    }

    public function TestDeleteProduct()
    {
        $this->productDto = $this->testCreateProduct();

        $this->productEntityManager->delete($this->productDto);

        $this->assertNull($this->container->getProductRepository()->getProduct($this->productDto->getProductId()));
        ;
    }

    private function createDto(String $name, String $description)
    {
        $this->productDto = new ProductDataTransferObject();
        $this->productDto->setProductName($name);
        $this->productDto->setProductDescription($description);
    }
}
