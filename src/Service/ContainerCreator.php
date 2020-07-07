<?php


namespace App\Service;

use App\Model\UserRepository;
use Symfony\Component\DependencyInjection\ContainerBuilder;

class ContainerCreator
{
    private ContainerBuilder $containerBuilder;

    public function __construct()
    {
        $containerBuilder = new ContainerBuilder();
    }

    public function provideService()
    {
        $this->containerBuilder->register('orm');
        //$this->containerBuilder->register()->getFactory()
        $this->provideModelService();
    }

    private function provideModelService()
    {
        $this->containerBuilder->register('userRepository', 'UserRepository');
        $this->containerBuilder->register('productRepository', 'productRepository');
        $this->containerBuilder->register('categoryRepository', 'categoryRepository');
        $this->containerBuilder->register('productEntityManager', 'productEntityManager');
        $this->containerBuilder->register('userEntityManager', 'userEntityManager');
        $this->containerBuilder->register('categoryEntityManager', 'categoryEntityManager');

    }
}
