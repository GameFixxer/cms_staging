<?php
declare(strict_types=1);
namespace App\Service;

use App\Import\ActionProvider;
use App\Import\CreateImport\CreateProduct;
use App\Import\CsvImportLoader;
use App\Import\Importer;
use App\Import\IntegrityManager\CategoryIntegrityManager;
use App\Import\IntegrityManager\ValueIntegrityManager;
use App\Import\Update\ProductImporter;
use App\Import\Update\ProductCategory;
use App\Import\Update\ProductInformation;
use App\Model\CategoryEntityManager;
use App\Model\CategoryRepository;
use App\Model\Entity\Category;
use App\Model\Entity\Product;
use App\Model\Entity\User;
use App\Model\Mapper\CategoryMapper;
use App\Model\Mapper\ProductMapper;
use App\Model\Mapper\UserMapper;
use App\Model\ProductEntityManager;
use App\Model\ProductRepository;
use App\Model\UserEntityManager;
use App\Model\UserRepository;
use Cycle\ORM\ORM;

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

        $container->setFactory(CategoryIntegrityManager::class, function (Container $container) {
            /** @var ORM $orm */
            $orm = $container->get(DatabaseManager::class);
            return new CategoryIntegrityManager(
                $orm->getRepository(Category::class)
            );
        });

        // Mapper
        $container->set(ProductMapper::class, new ProductMapper());
        $container->set(UserMapper::class, new UserMapper());
        $container->set(CategoryMapper::class, new CategoryMapper());
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

        $container->setFactory(CategoryRepository::class, function (Container $container) {
            /** @var ORM $orm */
            $orm = $container->get(DatabaseManager::class);
            return new CategoryRepository($container->get(CategoryMapper::class), $orm->getRepository(Category::class));
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

        $container->set(
            CategoryEntityManager::class,
            new CategoryEntityManager($container->get(DatabaseManager::class), $container->get(CategoryRepository::class))
        );

        //Import
        $container->set(CsvImportLoader::class, new CsvImportLoader());
        $container->set(ValueIntegrityManager::class, new ValueIntegrityManager());
        $container->set(CreateProduct::class, new CreateProduct($container->get(ProductRepository::class), $container->get(ProductEntityManager::class)));
        $container->set(ActionProvider::class, new ActionProvider());
        $container->setFactory(ProductImporter::class, function (Container $container) {
            $actionList = $container->get(ActionProvider::class);
            return new ProductImporter($actionList->getActionList(), $container);
        });
        $container->set(
            Importer::class,
            new Importer(
                $container->get(CsvImportLoader::class),
                $container->get(CreateProduct::class),
                $container->get(ProductImporter::class),
                dirname(__DIR__, 2).'../import/'
            )
        );
    }
}
