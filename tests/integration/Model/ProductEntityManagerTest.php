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
    private ProductDataTransferObject $productDTO;
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
        $transaction->delete($ormProductRepository->findByPK($this->productDTO->getProductId()));
        $transaction->run();
    }

    public function testCreateProduct()
    {
        $createdProduct = $this->productEntityManager->save($this->productDTO);

        $productFromRepository =  $this->container->getProductRepository()->getProduct($this->productDTO->getProductId());

        $this->assertSame($this->productDTO->getProductName(), $productFromRepository->getProductName());
        $this->assertSame($this->productDTO->getProductDescription(), $productFromRepository->getProductDescription());
        $this->assertSame($this->productDTO->getProductId(), $productFromRepository->getProductId());

        return $createdProduct;
    }

    public function testUpdateProduct()
    {
        $this->productDto = $this->testCreateProduct();

        $this->productDTO->setProductName('fabulous');
        $this->productDTO->setProductDescription('even more fabulous');
        $this->productDTO = $this->productEntityManager->save($this->productDTO);
        $productFromRepository =  $this->container->getProductRepository()->getProduct($this->productDTO->getProductId());

        $this->assertSame($this->productDTO->getProductName(), $productFromRepository->getProductName());
        $this->assertSame($this->productDTO->getProductDescription(), $productFromRepository->getProductDescription());
        $this->assertSame($this->productDTO->getProductId(), $productFromRepository->getProductId());
    }

    public function TestDeleteProduct()
    {
        $this->productDto = $this->testCreateProduct();

        $this->productEntityManager->delete($this->productDTO);

        $this->assertNull($this->container->getProductRepository()->getProduct($this->productDTO->getProductId()));
        ;
    }

    private function createDto(String $name, String $description)
    {
        $this->productDTO = new ProductDataTransferObject();
        $this->productDTO->setProductName($name);
        $this->productDTO->setProductDescription($description);
    }
}
