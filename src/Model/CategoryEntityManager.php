<?php
declare(strict_types=1);

namespace App\Model;

use App\Model\Dto\CategoryDataTransferObject;
use App\Model\Entity\Category;
use Cycle\ORM\ORM;
use Cycle\ORM\Transaction;

class CategoryEntityManager implements CategoryEntityManagerInterface
{
    /**
     * @var CategoryRepository
     */
    private CategoryRepository $categoryRepository;
    private \Cycle\ORM\RepositoryInterface $ormCategoryRepository;

    private ORM $orm;

    public function __construct(ORM $orm, CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->orm = $orm;
        $this->ormCategoryRepository = $orm->getRepository(Category::class);
    }



    public function delete(CategoryDataTransferObject $category):void
    {
        $transaction = new Transaction($this->orm);
        $transaction->delete($this->ormCategoryRepository->findByPK($category->getCategoryId()));
        $transaction->run();

        $this->categoryRepository->getCategoryList();
    }

    public function save(CategoryDataTransferObject $category): CategoryDataTransferObject
    {
        $transaction = new Transaction($this->orm);


        $entity = $this->ormCategoryRepository->findByPK($category->getCategoryId());
        if (!$entity instanceof Category) {
            $entity = new Category();
        }
        $entity->setCategoryKey($category->getCategoryKey());
        $transaction->persist($entity);
        $transaction->run();

        $category->setCategoryId($entity->getCategoryId());

        return $category;
    }
}
