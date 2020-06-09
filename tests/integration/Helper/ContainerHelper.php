<?php


namespace App\Tests\integration\Helper;

use App\Model\ProductEntityManager;
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
}
