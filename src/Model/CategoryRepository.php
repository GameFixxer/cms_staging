<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Entity\Category;
use App\Model\Dto\CategoryDataTransferObject;
use App\Model\Mapper\CategoryMapperInterface;

class CategoryRepository
{
    private CategoryMapperInterface $categoryMapper;
    private \Cycle\ORM\RepositoryInterface $ormCategoryRepository;

    /**
     * ProductRepository constructor.
     * @param CategoryMapperInterface $categoryMapper
     * @param \Cycle\ORM\RepositoryInterface $ormCategoryRepository
     */
    public function __construct(CategoryMapperInterface $categoryMapper, \Cycle\ORM\RepositoryInterface $ormCategoryRepository)
    {
        $this->categoryMapper = $categoryMapper;
        $this->ormCategoryRepository = $ormCategoryRepository;
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

    public function getCategory(int $categoryId): ?CategoryDataTransferObject
    {
        $categoryEntity = $this->ormCategoryRepository->findByPK($categoryId);
        if ($categoryEntity instanceof Category) {
            return $this->categoryMapper->map($categoryEntity);
        }
        return null;
    }
}
