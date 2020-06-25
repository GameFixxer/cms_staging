<?php


namespace App\Tests\integration\Helper;

use App\Import\CsvImportLoader;
use App\Import\ImportManager;
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
        $list = $this->getProductRepository()->getProductList();
        $idCounter = end($list)->getId() + 1;
        return (string)$idCounter;
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

    public function getImportManager():ImportManager
    {
        return $this->container->get(ImportManager::class);
    }

    public function getOrmProductRepository()
    {
        return $this->container->get(DatabaseManager::class);
    }
}
