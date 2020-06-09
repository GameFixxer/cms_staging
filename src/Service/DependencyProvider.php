<?php

namespace App\Service;

use App\Model\ProductEntityManager;
use App\Model\ProductRepository;
use App\Model\UserRepository;

class DependencyProvider
{
    public function providerDependency(Container $container):void
    {
        $container->setFactory(DatabaseManager::class, function () {
            $databaseManager = new DatabaseManager();
            return $databaseManager->connect();
        });
        $container->set(View::class, new View());
        $container->set(SessionUser::class, new SessionUser());
        $container->set(ProductRepository::class, new ProductRepository($container->get(DatabaseManager::class)));
        $container->set(UserRepository::class, new UserRepository($container->get(DatabaseManager::class)));
        $container->set(ProductEntityManager::class, new ProductEntityManager($container->get(DatabaseManager::class), $container->get(ProductRepository::class)));
    }
}
