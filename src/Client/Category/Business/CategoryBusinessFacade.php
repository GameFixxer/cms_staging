<?php
declare(strict_types=1);

namespace App\Client\Category\Business;

use App\Client\Category\Persistence\CategoryEntityManagerInterface;
use App\Client\Category\Persistence\CategoryRepositoryInterface;
use App\Generated\Dto\CategoryDataTransferObject;

class CategoryBusinessFacade implements CategoryBusinessFacadeInterface
{
    private CategoryRepositoryInterface $categoryRepository;
    private CategoryEntityManagerInterface $categoryEntityManager;

    public function __construct(CategoryRepositoryInterface $categoryRepository, CategoryEntityManagerInterface $categoryEntityManager)
    {
        $this->categoryRepository = $categoryRepository;
        $this->categoryEntityManager = $categoryEntityManager;
    }

    public function get(int $categoryId): ?CategoryDataTransferObject
    {
        return $this->categoryRepository->getCategory($categoryId);
    }

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

    public function save(CategoryDataTransferObject $category): CategoryDataTransferObject
    {
        return $this->categoryEntityManager->save($category);
    }

    public function delete(CategoryDataTransferObject $category):void
    {
        $this->categoryEntityManager->delete($category);
    }
}
