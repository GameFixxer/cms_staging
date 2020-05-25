<?php

namespace App\Service;

use App\Service\Container;
use App\Model\ProductEntityManager;
use App\Model\ProductRepository;
use App\Service\View;
use App\Service\SQLConnector;
use App\Model\UserRepository;

class DependencyProvider
{
    public function providerDependency(Container $container):void
    {
        $container->setFactory(SQLConnector::class, function () {
            $sqlConnector = new SQLConnector();
            $sqlConnector->connect();
            return $sqlConnector;
        });
        $container->set(View::class, new View());
        $container->set(SessionUser::class, new SessionUser());
        $container->set(ProductRepository::class, new ProductRepository($container->get(SQLConnector::class)));
        $container->set(UserRepository::class, new UserRepository($container->get(SQLConnector::class)));
        $container->set(ProductEntityManager::class, new ProductEntityManager($container->get(SQLConnector::class), $container->get(ProductRepository::class)));
    }
}
