<?php

namespace App\Service;

use App\Model\Entity\EntityInterface;
use App\Model\Entity\Product;
use App\Model\Entity\User;
use App\Model\Mapper\ProductMapper;
use App\Model\Mapper\ProductMapperInterface;
use App\Model\Mapper\UserMapper;
use App\Model\Mapper\UserMapperInterface;
use App\Model\ProductEntityManager;
use App\Model\ProductRepository;
use App\Model\UserEntityManager;
use App\Model\UserRepository;
use Cycle\ORM\ORM;
use Cycle\ORM\RepositoryInterface;

class DependencyProvider
{
    public function providerDependency(Container $container): void
    {
        $this->persistenceDependency($container);

        $container->set(View::class, new View());
        $container->set(SessionUser::class, new SessionUser());
    }

    /**
     * @param Container $container
     * @throws \Exception
     */
    private function persistenceDependency(Container $container): void
    {
        //Service
        $container->setFactory(DatabaseManager::class, function () {
            $databaseManager = new DatabaseManager();

            return $databaseManager->connect();
        });
        $container->set(PasswordManager::class, new PasswordManager());

        // Mapper
        $container->set(ProductMapper::class, new ProductMapper());
        $container->set(UserMapper::class, new UserMapper());
        $container->set(EmailManager::class, new EmailManager());
        $container->set(SymfonyMailerManager::class, new SymfonyMailerManager());

        // Repositorys
        $container->setFactory(ProductRepository::class, function (Container $container) {
            /** @var ORM $orm */
            $orm = $container->get(DatabaseManager::class);
            return new ProductRepository($container->get(ProductMapper::class), $orm->getRepository(Product::class));
        });

        $container->setFactory(UserRepository::class, function (Container $container) {
            /** @var ORM $orm */
            $orm = $container->get(DatabaseManager::class);
            return new UserRepository($container->get(UserMapper::class), $orm->getRepository(User::class));
        });

        //Entitymanager
        $container->set(
            UserEntityManager::class,
            new UserEntityManager($container->get(DatabaseManager::class), $container->get(UserRepository::class))
        );

        $container->set(
            ProductEntityManager::class,
            new ProductEntityManager($container->get(DatabaseManager::class), $container->get(ProductRepository::class))
        );
    }
}
