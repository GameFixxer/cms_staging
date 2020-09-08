<?php

declare(strict_types=1);

namespace App\Client\Category\Persistence;


use App\Client\Category\Persistence\Entity\Category;
use App\Client\Category\Persistence\Mapper\CategoryMapperInterface;
use App\Generated\CategoryDataProvider;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;


class CategoryRepository implements CategoryRepositoryInterface
{
    private CategoryMapperInterface $categoryMapper;
    private EntityRepository $entityManager;

    /**
     * ProductRepository constructor.
     * @param CategoryMapperInterface $categoryMapper
     * @param EntityManager $entityManager
     */
    public function __construct(CategoryMapperInterface $categoryMapper, EntityManager $entityManager)
    {
        $this->categoryMapper = $categoryMapper;
        $this->entityManager = $entityManager->getRepository(Category::class);
    }


    /**
     * @return CategoryDataProvider[]
     */
    public function getCategoryList(): array
    {
        $categoryList = [];
        $categoryEntityList = (array)$this->entityManager->findAll();
        /** @var  Category $category */
        foreach ($categoryEntityList as $category) {
            $categoryList[] = $this->categoryMapper->map($category);
        }
        return $categoryList;
    }

    /**
     * @param int $categoryId
     * @return CategoryDataProvider|null
     */
    public function getCategory(int $categoryId): ?CategoryDataProvider
    {
        $categoryEntity = $this->entityManager->findBy(['categoryId'=> $categoryId]);
        if ($categoryEntity !== null) {
            return $this->categoryMapper->map($categoryEntity[0]);
        }
        return null;
    }

    /**
     * @param string $key
     * @return CategoryDataProvider|null
     */
    public function getCategoryByKey(string $key): ?CategoryDataProvider
    {
        $categoryEntity = $this->entityManager->findBy(['category_key'=>$key]);
        if ($categoryEntity !== null) {
            return $this->categoryMapper->map($categoryEntity[0]);
        }
        return null;
    }
}
