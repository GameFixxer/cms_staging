<?php


namespace App\Tests\integration\Model;

use App\Model\Dto\ProductDataTransferObject;
use App\Model\Entity\Product;
use App\Model\ProductEntityManager;
use App\Service\Container;
use App\Service\DependencyProvider;
use App\Service\View;

class Helper
{
    /**
     * Define custom actions here
     * @param int $id
     * @throws Exception
     */
    private Container $container;

    public function __construct()
    {
        $this->setUp();
    }

    public function getProduct(int $id): ?ProductDataTransferObject
    {
        $productRepository = $this->getProductRepository();
        return $productRepository->getProduct($id);
    }

    public function createProduct(String $name, String $description)
    {
        $productEntityManager = $this->getProductEntityManager();
        $productDTO = $this->createDTO($name, $description);
        return $productEntityManager->save($productDTO);
    }
    public function updateProduct(ProductDataTransferObject $productDTO, String $name, String $description)
    {
        $productEntityManager = $this->getProductEntityManager();
        $productDTO = $this->updateDTO($productDTO, $name, $description);
        return $productEntityManager->save($productDTO);
    }
    public function deleteProduct(ProductDataTransferObject $productDTO):void
    {
        $productEntityManager = $this->getProductEntityManager();
        $productEntityManager->delete($productDTO);
    }
    private function updateDTO(ProductDataTransferObject $productDTO, String $name, String $description)
    {
        $productDTO->setProductName($name);
        $productDTO->setProductDescription($description);
        return $productDTO;
    }
    private function createDTO(String $name, String $description): ProductDataTransferObject
    {
        $productDTO = new ProductDataTransferObject();
        $productDTO->setProductName($name);
        $productDTO->setProductDescription($description);
        return $productDTO;
    }
    private function setUp() :void
    {
        $this->container = new Container();
        $containerProvider = new DependencyProvider();
        $containerProvider->providerDependency($this->container);
    }
    private function getProductRepository():\App\Model\ProductRepository
    {
        return $this->container->get(\App\Model\ProductRepository::class);
    }
    private function getProductEntityManager():\App\Model\ProductEntityManager
    {
        return $this->container->get(ProductEntityManager::class);
    }
}
