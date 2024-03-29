<?php


namespace App\Tests\integration\Helper;

use App\Backend\ImportComponent\Loader\CsvImportLoader;
use App\Backend\ImportProduct\Business\Model\Create\Product;
use App\Backend\ImportProduct\Business\Model\Update\ProductAttribute;
use App\Backend\ImportProduct\Business\Model\Update\ProductCategory;
use App\Backend\ImportProduct\Business\Model\Update\ProductImporter;
use App\Backend\ImportProduct\Business\Model\Update\ProductInformation;
use App\Client\Attribute\Persistence\AttributeEntityManager;
use App\Client\Attribute\Persistence\AttributeRepository;
use App\Client\Category\Persistence\CategoryEntityManager;
use App\Client\Category\Persistence\CategoryRepository;
use App\Client\Product\Persistence\ProductEntityManager;
use App\Client\Product\Persistence\ProductRepository;
use App\Client\User\Persistence\UserEntityManager;
use App\Client\User\Persistence\UserRepository;
use App\Component\SymfonyContainer;
use App\Service\DatabaseManager;
use App\Service\SessionUser;
use Cycle\ORM\ORM;

class ContainerHelper
{
    /**
     * Define custom actions here
     * @param int $id
     * @throws Exception
     */
    private $container;

    public function __construct()
    {
        $this->container = (new SymfonyContainer())->getContainer();
    }

    public function getContainer()
    {
        return $this->container;
    }

    public function createArticleNumber(): string
    {
        return rand(1, 1000).substr(rand(1, 1000), rand(1, 1000));
    }

    public function getProductRepository(): ProductRepository
    {
        return $this->container->get(ProductRepository::class);
    }

    public function getProductEntityManager(): ProductEntityManager
    {
        return $this->container->get(ProductEntityManager::class);
    }

    public function getUserEntityManager(): UserEntityManager
    {
        return $this->container->get(UserEntityManager::class);
    }

    public function getUserRepository(): UserRepository
    {
        return $this->container->get(UserRepository::class);
    }

    public function getCategoryEntityManager(): CategoryEntityManager
    {
        return $this->container->get(CategoryEntityManager::class);
    }

    public function getCategoryRepository(): CategoryRepository
    {
        return $this->container->get(CategoryRepository::class);
    }

    public function getCsvImportLoader(): CsvImportLoader
    {
        return $this->container->get(CsvImportLoader::class);
    }

    public function getOrmProductRepository(): DatabaseManager
    {
        return ($this->container->get(DatabaseManager::class))->connect();
    }

    public function getCreateProduct(): Product
    {
        return $this->container->get(Product::class);
    }

    public function getUpdateProductCategory(): ProductCategory
    {
        return $this->container->get(ProductCategory::class);
    }

    public function getUpdateProductInformation(): ProductInformation
    {
        return $this->container->get(ProductInformation::class);
    }

    public function getUpdateImport(): ProductImporter
    {
        return $this->container->get(ProductImporter::class);
    }

    public function getAttributeRepository(): AttributeRepository
    {
        return $this->container->get(AttributeRepository::class);
    }

    public function getUpdateAttribute(): ProductAttribute
    {
        return $this->container->get(ProductAttribute::class);
    }

    public function getAttributeEntityManager(): AttributeEntityManager
    {
        return $this->container->get(AttributeEntityManager::class);
    }
    public function getUserSession(): SessionUser
    {
        return$this->container->get(SessionUser::class);
    }
}
