<?php


namespace App\Tests\integration\Model;


use App\Client\Category\Persistence\CategoryEntityManager;
use App\Client\Category\Persistence\Entity\Category;
use App\Generated\CategoryDataProvider;
use App\Service\DatabaseManager;
use App\Tests\integration\Helper\ContainerHelper;
use Cycle\ORM\Transaction;

/**
 * @group CategoryEntityManagerTest
 */
class CategoryEntityManagerTest extends \Codeception\Test\Unit
{
    private CategoryDataProvider $categoryDTO;
    private ContainerHelper $container;
    private CategoryEntityManager $categoryEntityManager;

    public function _before()
    {
        $this->container = new ContainerHelper();
        $this->categoryEntityManager = $this->container->getCategoryEntityManager();
        $this->createDto('testcategory');

    }

    public function _after()
    {
        $orm = new DatabaseManager();
        $orm = $orm->connect();
        $ormProductRepository = $orm->getRepository(Category::class);
        $transaction = new Transaction($orm);
        $transaction->delete($ormProductRepository->findByPK($this->categoryDTO->getCategoryId()));
        $transaction->run();
    }

    public function testCreateCategory()
    {
        $this->categoryEntityManager->save($this->categoryDTO);
        $productFromRepository = $this->container->getCategoryRepository()->getCategory($this->categoryDTO->getCategoryId());
        $this->assertSame($this->categoryDTO->getCategoryId(), $productFromRepository->getCategoryId());
        $this->assertSame($this->categoryDTO->getCategoryKey(), $productFromRepository->getCategoryKey());

    }

    public function testUpdateCategory()
    {
        $this->testCreateCategory();
        $this->categoryDTO->setCategoryKey('fabulous');
        $this->categoryDTO = $this->categoryEntityManager->save($this->categoryDTO);
        $productFromRepository = $this->container->getCategoryRepository()->getCategory($this->categoryDTO->getCategoryId());

        $this->assertSame($this->categoryDTO->getCategoryKey(), $productFromRepository->getCategoryKey());
        $this->assertSame($this->categoryDTO->getCategoryId(), $productFromRepository->getCategoryId());
    }

    public function TestDeleteCategory()
    {
        $this->testCreateCategory();

        $this->categoryEntityManager->delete($this->categoryDTO);

        $this->assertNull($this->container->getCategoryRepository()->getCategory($this->categoryDTO->getCategoryId()));
    }

    private function createDto(string $categoryKey)
    {
        $this->categoryDTO = new CategoryDataProvider();
        $this->categoryDTO->setCategoryKey($categoryKey);
    }
}
