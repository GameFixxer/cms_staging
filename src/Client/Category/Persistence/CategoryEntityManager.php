<?php
declare(strict_types=1);

namespace App\Client\Category\Persistence;

use App\Client\Category\Persistence\Entity\Category;
use App\Generated\CategoryDataProvider;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class CategoryEntityManager implements CategoryEntityManagerInterface
{
    /**
     * @var CategoryRepository
     */
    private CategoryRepository $categoryRepository;
    private EntityRepository $entityRepository;
    private \Spiral\Database\DatabaseInterface $database;
    private EntityManager $entityManager;

    public function __construct(EntityManager $entityManager, CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->entityManager = $entityManager;
        $this->entityRepository = $entityManager->getRepository(Category::class);
    }



    public function delete(CategoryDataProvider $category):void
    {
        $this->entityManager->remove($category);
        $this->categoryRepository->getCategoryList();
    }

    public function save(CategoryDataProvider $category): CategoryDataProvider
    {
        if ($category->hasCategoryId()) {
            $this->entityRepository->createQueryBuilder('c')
                ->update()
                ->set('c.key', ':categoryKey')
                ->where('c.id = :categoryId')
                ->setParameter(':categoryKey', $category->getCategoryKey())
                ->setParameter(':categoryId', $category->getCategoryId())
                ->getQuery()
                ->execute();

            $this->entityManager->clear();
        } else {
            $categoryEntity = new Category();
            $categoryEntity = $this->convert($categoryEntity, $category);

            $this->entityManager->persist($categoryEntity);
            $this->entityManager->flush();
        }




        return $category;
    }
    private function convert(Category $categoryEntity, CategoryDataProvider $categoryDataProvider): Category
    {
        $categoryEntity->setKey($categoryDataProvider->getCategoryKey());
        return $categoryEntity;
    }
}
