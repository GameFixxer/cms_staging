<?php

declare(strict_types=1);

namespace App\Client\Category\Persistence;


use App\Client\Category\Persistence\Entity\Category;
use App\Client\Category\Persistence\Mapper\CategoryMapperInterface;
use App\Generated\Dto\CategoryDataTransferObject;


class CategoryRepository implements CategoryRepositoryInterface
{
    private CategoryMapperInterface $categoryMapper;
    private \Cycle\ORM\RepositoryInterface $ormCategoryRepository;

    /**
     * ProductRepository constructor.
     * @param CategoryMapperInterface $categoryMapper
     * @param \Cycle\ORM\ORM $ormCategoryRepository
     */
    public function __construct(CategoryMapperInterface $categoryMapper, \Cycle\ORM\ORM $ormCategoryRepository)
    {
        $this->categoryMapper = $categoryMapper;
        $this->ormCategoryRepository = $ormCategoryRepository->getRepository(Category::class);
    }


    /**
     * @return CategoryDataTransferObject[]
     */
    public function getCategoryList(): array
    {
        $categoryList = [];
        $categoryEntityList = (array)$this->ormCategoryRepository->select()->fetchALl();
        /** @var  Category $category */
        foreach ($categoryEntityList as $category) {
            $categoryList[] = $this->categoryMapper->map($category);
        }
        return $categoryList;
    }

    /**
     * @param int $categoryId
     * @return \App\Generated\Dto\CategoryDataTransferObject|null
     */
    public function getCategory(int $categoryId): ?CategoryDataTransferObject
    {
        $categoryEntity = $this->ormCategoryRepository->findByPK($categoryId);
        if ($categoryEntity instanceof Category) {
            return $this->categoryMapper->map($categoryEntity);
        }
        return null;
    }

    /**
     * @param string $key
     * @return \App\Generated\Dto\CategoryDataTransferObject|null
     */
    public function getCategoryByKey(string $key): ?CategoryDataTransferObject
    {
        $categoryEntity = $this->ormCategoryRepository->findOne(['category_key'=>$key]);
        if ($categoryEntity instanceof Category) {
            return $this->categoryMapper->map($categoryEntity);
        }
        return null;
    }
}
