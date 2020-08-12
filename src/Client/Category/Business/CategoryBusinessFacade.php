<?php
declare(strict_types=1);

namespace App\Client\Category\Business;

use App\Client\Category\Persistence\CategoryEntityManagerInterface;
use App\Client\Category\Persistence\CategoryRepositoryInterface;
use App\Generated\CategoryDataProvider;

class CategoryBusinessFacade implements CategoryBusinessFacadeInterface
{
    private CategoryRepositoryInterface $categoryRepository;
    private CategoryEntityManagerInterface $categoryEntityManager;

    public function __construct(CategoryRepositoryInterface $categoryRepository, CategoryEntityManagerInterface $categoryEntityManager)
    {
        $this->categoryRepository = $categoryRepository;
        $this->categoryEntityManager = $categoryEntityManager;
    }

    public function get(int $categoryId): ?CategoryDataProvider
    {
        return $this->categoryRepository->getCategory($categoryId);
    }

    public function getByKey(string $key): ?CategoryDataProvider
    {
        return $this->categoryRepository->getCategoryByKey($key);
    }

    /**
     * @return CategoryDataProvider[]
     */
    public function getList():array
    {
        return $this->categoryRepository->getCategoryList();
    }

    public function save(CategoryDataProvider $category): CategoryDataProvider
    {
        return $this->categoryEntityManager->save($category);
    }

    public function delete(CategoryDataTransferObject $category):void
    {
        $this->categoryEntityManager->delete($category);
    }
}
