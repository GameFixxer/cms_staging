<?php
declare(strict_types=1);

namespace App\Client\Category\Business;

use App\Client\Category\Persistence\CategoryEntityManagerInterface;
use App\Client\Category\Persistence\CategoryRepositoryInterface;
use App\Generated\Dto\CategoryDataTransferObject;

class CategoryBusinessFacade implements CategoryBusinessFacadeInterface
{
    /**
     * @var \App\Client\Category\Persistence\CategoryRepositoryInterface
     */
    private CategoryRepositoryInterface $categoryRepository;
    /**
     * @var \App\Client\Category\Persistence\CategoryEntityManagerInterface
     */
    private CategoryEntityManagerInterface $categoryEntityManager;

    /**
     * @param \App\Client\Category\Persistence\CategoryRepositoryInterface $categoryRepository
     * @param \App\Client\Category\Persistence\CategoryEntityManagerInterface $categoryEntityManager
     */
    public function __construct(CategoryRepositoryInterface $categoryRepository, CategoryEntityManagerInterface $categoryEntityManager)
    {
        $this->categoryRepository = $categoryRepository;
        $this->categoryEntityManager = $categoryEntityManager;
    }

    /**
     * @param int $categoryId
     * @return \App\Generated\Dto\CategoryDataTransferObject|null
     */
    public function get(int $categoryId): ?CategoryDataTransferObject
    {
        return $this->categoryRepository->getCategory($categoryId);
    }

    /**
     * @param string $key
     * @return \App\Generated\Dto\CategoryDataTransferObject|null
     */
    public function getByKey(string $key): ?CategoryDataTransferObject
    {
        return $this->categoryRepository->getCategoryByKey($key);
    }

    /**
     * @return CategoryDataTransferObject[]
     */
    public function getList():array
    {
        return $this->categoryRepository->getCategoryList();
    }

    /**
     * @param \App\Generated\Dto\CategoryDataTransferObject $category
     * @return \App\Generated\Dto\CategoryDataTransferObject
     */
    public function save(CategoryDataTransferObject $category): CategoryDataTransferObject
    {
        return $this->categoryEntityManager->save($category);
    }

    /**
     * @param \App\Generated\Dto\CategoryDataTransferObject $category
     */
    public function delete(CategoryDataTransferObject $category):void
    {
        $this->categoryEntityManager->delete($category);
    }
}
