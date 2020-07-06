<?php


namespace App\Tests\integration\Helper;

use App\Import\Create\Product;
use App\Import\CsvImportLoader;
use App\Import\Update\ProductImporter;
use App\Import\Update\ProductCategory;
use App\Import\Update\ProductInformation;
use App\Model\CategoryEntityManager;
use App\Model\ProductEntityManager;
use App\Model\UserEntityManager;
use App\Service\Container;
use App\Service\DatabaseManager;
use App\Service\DependencyProvider;
use Cycle\ORM\ORM;

class ContainerHelper
{
    /**
     * Define custom actions here
     * @param int $id
     * @throws Exception
     */
    private Container $container;

    public function __construct()
    {
        $this->container = new Container();
        $containerProvider = new DependencyProvider();
        $containerProvider->providerDependency($this->container);
    }

    public function getContainer():Container
    {
        return $this->container;
    }
    public function createArticleNumber():string
    {
        return rand(1, 1000).substr(rand(1, 1000), rand(1, 1000));
    }
    public function getProductRepository():\App\Model\ProductRepository
    {
        return $this->container->get(\App\Model\ProductRepository::class);
    }
    public function getProductEntityManager():\App\Model\ProductEntityManager
    {
        return $this->container->get(ProductEntityManager::class);
    }
    public function getUserEntityManager():\App\Model\UserEntityManager
    {
        return $this->container->get(UserEntityManager::class);
    }
    public function getUserRepository():\App\Model\UserRepository
    {
        return $this->container->get(\App\Model\UserRepository::class);
    }

    public function getCategoryEntityManager():\App\Model\CategoryEntityManager
    {
        return $this->container->get(CategoryEntityManager::class);
    }
    public function getCategoryRepository():\App\Model\CategoryRepository
    {
        return $this->container->get(\App\Model\CategoryRepository::class);
    }

    public function getCsvImportLoader():CsvImportLoader
    {
        return $this->container->get(CsvImportLoader::class);
    }

    public function getOrmProductRepository()
    {
        return $this->container->get(DatabaseManager::class);
    }

    public function getCreateProduct()
    {
        return$this->container->get(Product::class);
    }
    public function getUpdateProductCategory()
    {
        return new ProductCategory($this->container);
    }

    public function getUpdateProductInformation()
    {
        return new ProductInformation($this->container);
    }

    public function getUpdateImport()
    {
        return $this->container->get(ProductImporter::class);
    }
}
