<?php
declare(strict_types=1);
namespace App\Component;

use App\Backend\ImportCategory\Business\Model\Update\CategoryImporter;
use App\Backend\ImportComponent\ImportFilterProvider;
use App\Backend\ImportComponent\Loader\CsvImportLoader;
use App\Backend\ImportComponent\Mapper\CategoryMappingAssistant;
use App\Backend\ImportComponent\Mapper\ProductMappingAssistant;
use App\Backend\ImportComponent\StringConverter\StringConverter;
use App\Backend\ImportProduct\Business\Model\ActionProvider;
use App\Backend\ImportProduct\Business\Model\Importer;
use App\Backend\ImportCategory\Business\Model\Importer as ImporterCategory;
use App\Backend\ImportProduct\Business\Model\Create\Product as ProductImport;
use App\Backend\ImportCategory\Business\Model\Create\Category as CategoryImport;
use App\Backend\ImportProduct\Business\Model\IntegrityManager\CategoryIntegrityManager;
use App\Backend\ImportProduct\Business\Model\IntegrityManager\ValueIntegrityManager;
use App\Backend\ImportProduct\Business\Model\Update\ProductCategory;
use App\Backend\ImportProduct\Business\Model\Update\ProductImporter;
use App\Backend\ImportProduct\Business\Model\Update\ProductInformation;
use App\Client\Category\Business\CategoryBusinessFacade;
use App\Client\Category\Persistence\CategoryEntityManager;
use App\Client\Category\Persistence\CategoryRepository;
use App\Client\Category\Persistence\Entity\Category;
use App\Client\Category\Persistence\Mapper\CategoryMapper;
use App\Client\Product\Business\ProductBusinessFacade;
use App\Client\Product\Persistence\Entity\Product;
use App\Client\Product\Persistence\Mapper\ProductMapper;
use App\Client\Product\Persistence\ProductEntityManager;
use App\Client\Product\Persistence\ProductRepository;
use App\Client\User\Business\UserBusinessFacade;
use App\Client\User\Persistence\Entity\User;
use App\Client\User\Persistence\Mapper\UserMapper;
use App\Client\User\Persistence\UserEntityManager;
use App\Client\User\Persistence\UserRepository;
use App\Frontend\Product\Business\ProductManager;
use App\Frontend\User\Business\UserManager;
use App\Service\DatabaseManager;
use App\Service\File\FileServiceClient;
use App\Service\File\Model\Get;
use App\Service\File\Model\Move;
use App\Service\PasswordManager;
use App\Service\SessionUser;
use App\Service\SymfonyMailerManager;
use Cycle\ORM\ORM;
use Symfony\Component\Filesystem\Filesystem;
use Symfony\Component\Finder\Finder;

class DependencyProvider
{
    public function providerDependency(Container $container): void
    {
        $this->persistDatabaseDependency($container);
        $this->persistMapperDependency($container);
        $this->persistRepositoryDependency($container);
        $this->persistEntityManagerDependency($container);
        $this->persistsBusinessFacadeDependency($container);
        $this->persistServiceDependency($container);
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

    private function persistEntityManagerDependency(Container $container):void
    {
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
    }

    private function persistsBusinessFacadeDependency(Container $container): void
    {
        $container->set(
            ProductBusinessFacade::class,
            new ProductBusinessFacade(
                $container->get(ProductRepository::class),
                $container->get(
                    ProductEntityManager::class
                )
            )
        );

        $container->set(
            CategoryBusinessFacade::class,
            new CategoryBusinessFacade(
                $container->get(CategoryRepository::class),
                $container->get(CategoryEntityManager::class)
            )
        );

        $container->set(
            UserBusinessFacade::class,
            new UserBusinessFacade(
                $container->get(UserRepository::class),
                $container->get(UserEntityManager::class)
            )
        );
    }

    private function persistServiceDependency(Container $container):void
    {
        //Service
        $container->set(PasswordManager::class, new PasswordManager());
        $container->set(SymfonyMailerManager::class, new SymfonyMailerManager());
        $container->set(Finder::class, new Finder());
        $container->set(Filesystem::class, new Filesystem());
        $container->set(Get::class, new Get($container->get(Finder::class)));
        $container->set(Move::class, new Move($container->get(Filesystem::class)));
        $container->set(FileServiceClient::class, new FileServiceClient($container->get(Get::class), $container->get(Move::class)));
    }

    private function persistenceDependency(Container $container): void
    {

        //Import

        $container->setFactory(CategoryIntegrityManager::class, function (Container $container) {
            /** @var ORM $orm */
            $orm = $container->get(DatabaseManager::class);
            return new CategoryIntegrityManager(
                $orm->getRepository(Category::class)
            );
        });
        $container->set(StringConverter::class, new StringConverter());
        $container->set(ImportFilterProvider::class, new ImportFilterProvider());
        $container->setFactory(ProductMappingAssistant::class, function (Container $container) {
            $array = $container->get(ImportFilterProvider::class);
            return new ProductMappingAssistant($container->get(StringConverter::class), $array->getProductFilterList());
        });
        $container->setFactory(CategoryMappingAssistant::class, function (Container $container) {
            $array = $container->get(ImportFilterProvider::class);
            return new CategoryMappingAssistant($container->get(StringConverter::class), $array->getCategoryFilterList());
        });
        $container->set(CsvImportLoader::class, new CsvImportLoader($container->get(FileServiceClient::class), $container->get(ProductMappingAssistant::class)));
        $container->set(ValueIntegrityManager::class, new ValueIntegrityManager());
        $container->set(ProductImport::class, new ProductImport($container->get(ProductBusinessFacade::class)));
        $container->set(CategoryImport::class, new CategoryImport($container->get(CategoryBusinessFacade::class)));
        $container->set(
            ProductCategory::class,
            new ProductCategory(
                $container->get(CategoryBusinessFacade::class),
                $container->get(ProductBusinessFacade::class),
                $container->get(CategoryIntegrityManager::class),
                $container->get(ValueIntegrityManager::class)
            )
        );
        $container->set(
            ProductInformation::class,
            new ProductInformation(
                $container->get(ProductBusinessFacade::class),
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
        $container->set(ProductManager::class, new ProductManager($container->get(ProductBusinessFacade::class)));
        $container->set(UserManager::class, new UserManager($container->get(UserBusinessFacade::class)));
    }
}
