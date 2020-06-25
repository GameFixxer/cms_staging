<?php


namespace App\Tests\integration\Model;

use App\Model\CategoryRepository;
use App\Model\Entity\Category;
use App\Model\Entity\TestEntity;
use App\Model\Mapper\CategoryMapper;
use App\Service\DatabaseManager;
use App\Tests\integration\Helper\ContainerHelper;
use Cycle\ORM\Transaction;

class CategoryRepositoryTest extends \Codeception\Test\Unit
{
    private ContainerHelper $container;
    private Transaction $transaction;
    private \Cycle\ORM\RepositoryInterface $ormCategoryRepository;
    private Category $entity;

    public function _before()
    {
        $this->container = new ContainerHelper();

        $databaseManager = new DatabaseManager();

        $orm = $databaseManager->connect();

        $this->ormCategoryRepository = $orm->getRepository(Category::class);

        $this->transaction = new Transaction($orm);
        $this->transaction->persist($this->createCategoryEntity());
        $this->transaction->run();
    }

    public function _after()
    {
        if ($this->ormCategoryRepository->findByPK($this->entity->getId()) instanceof Category) {
            $this->transaction->delete($this->ormCategoryRepository->findByPK($this->entity->getId()));
            $this->transaction->run();
        }
    }

    public function testGetCategoryWithExistingCategory()
    {
        $categoryRepository = $this->container->getCategoryRepository();

        $categoryDtoFromRepository = $categoryRepository->getCategory($this->entity->getId());
        $this->assertSame($this->entity->getId(), $categoryDtoFromRepository->getCategoryId());
        $this->assertSame($this->entity->getKey(), $categoryDtoFromRepository->getCategoryKey());
    }

    public function testGetCategoryWithNonExistingCategory()
    {
        $categoryRepository = $this->container->getCategoryRepository();

        $this->assertNull($categoryRepository->getCategory(0));
    }

    public function testGetLastCategoryOfProductListWithNonEmptyDatabase()
    {
        $categoryRepository = $this->container->getCategoryRepository();

        $categoryListFromCategoryRepository = $categoryRepository->getCategoryList();

        $lastCategoryOfCategoryRepositoryList = end($categoryListFromCategoryRepository);

        $this->assertSame($this->entity->getId(), $lastCategoryOfCategoryRepositoryList->getCategoryId());
        $this->assertSame($this->entity->getKey(), $lastCategoryOfCategoryRepositoryList->getCategoryKey());
    }

    public function testGetCategoryListWithEmptyDatabase()
    {
        $databaseManager = new DatabaseManager();
        $orm = $databaseManager->connect();
        $mock = $this->construct(CategoryRepository::class, [new CategoryMapper(), $orm->getRepository(TestEntity::class)]);
        $this->assertEmpty($mock->getCategoryList());
    }

    private function createCategoryEntity() :Category
    {
        $this->entity = new Category();
        $this->entity->setKey('tester');

        return $this->entity;
    }
}
