<?php
declare(strict_types=1);
namespace App\Service;

use App\Backend\ImportCategory\Business\Model\Update\CategoryImporter;
use App\Backend\ImportProduct\Business\Model\ActionProvider;
use App\Backend\ImportProduct\Business\Model\CsvImportLoader;
use App\Backend\ImportProduct\Business\Model\Importer;
use App\Backend\ImportCategory\Business\Model\Importer as ImporterCategory;
use App\Backend\ImportProduct\Business\Model\Create\Product as ProductImport;
use App\Backend\ImportCategory\Business\Model\Create\Category as CategoryImport;
use App\Backend\ImportProduct\Business\Model\IntegrityManager\CategoryIntegrityManager;
use App\Backend\ImportProduct\Business\Model\IntegrityManager\ValueIntegrityManager;
use App\Backend\ImportProduct\Business\Model\Update\ProductCategory;
use App\Backend\ImportProduct\Business\Model\Update\ProductImporter;
use App\Backend\ImportProduct\Business\Model\Update\ProductInformation;
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
        $this->persistDatabaseDependency($container);
        $this->persistMapperDependency($container);
        $this->persistRepositoryDependency($container);
        $this->persistenceDependency($container);

        $container->set(View::class, new View());
        $container->set(SessionUser::class, new SessionUser());
    }
    /**
     * @param Container $container
     * @throws \Exception
     */

    private function persistDatabaseDependency(Container $container):void
    {
        $container->setFactory(DatabaseManager::class, function () {
            $databaseManager = new DatabaseManager();

            return $databaseManager->connect();
        });
    }
    private function persistMapperDependency(Container $container):void
    {
        // Mapper
        $container->set(ProductMapper::class, new ProductMapper());
        $container->set(UserMapper::class, new UserMapper());
        $container->set(CategoryMapper::class, new CategoryMapper());
    }

    private function persistRepositoryDependency(Container $container):void
    {
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
    }

    private function persistenceDependency(Container $container): void
    {
        //Service

        $container->set(PasswordManager::class, new PasswordManager());

        $container->setFactory(CategoryIntegrityManager::class, function (Container $container) {
            /** @var ORM $orm */
            $orm = $container->get(DatabaseManager::class);
            return new CategoryIntegrityManager(
                $orm->getRepository(Category::class)
            );
        });
        $container->set(SymfonyMailerManager::class, new SymfonyMailerManager());


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
        $container->set(ProductImport::class, new ProductImport($container->get(ProductRepository::class), $container->get(ProductEntityManager::class)));
        $container->set(CategoryImport::class, new CategoryImport($container->get(CategoryRepository::class), $container->get(CategoryEntityManager::class)));
        $container->set(
            ProductCategory::class,
            new ProductCategory(
                $container->get(CategoryRepository::class),
                $container->get(CategoryEntityManager::class),
                $container->get(ProductEntityManager::class),
                $container->get(CategoryIntegrityManager::class),
                $container->get(ValueIntegrityManager::class)
            )
        );
        $container->set(
            ProductInformation::class,
            new ProductInformation(
                $container->get(ProductRepository::class),
                $container->get(ProductEntityManager::class),
                $container->get(ValueIntegrityManager::class)
            )
        );
        $container->set(ActionProvider::class, new ActionProvider($container));

        $container->setFactory(ProductImporter::class, function (Container $container) {
            $actionList = $container->get(ActionProvider::class);
            return new ProductImporter($actionList->getProductActionList());
        });
        $container->setFactory(CategoryImporter::class, function (Container $container) {
            $actionList = $container->get(ActionProvider::class);
            return new CategoryImporter($actionList->getCategoryActionList());
        });
        $container->set(
            ImporterCategory::class,
            new ImporterCategory(
                $container->get(CsvImportLoader::class),
                $container->get(CategoryImport::class),
                $container->get(CategoryImporter::class),
                dirname(__DIR__, 2).'../import/'
            )
        );
        $container->set(
            Importer::class,
            new Importer(
                $container->get(CsvImportLoader::class),
                $container->get(ProductImport::class),
                $container->get(ProductImporter::class),
                dirname(__DIR__, 2).'../import/'
            )
        );
    }
}
