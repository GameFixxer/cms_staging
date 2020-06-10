<?php


namespace App\Tests\integration\Helper;

use App\Model\ProductEntityManager;
use App\Model\UserEntityManager;
use App\Service\Container;
use App\Service\DependencyProvider;

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
}
