<?php
declare(strict_types=1);


namespace App\Backend\ImportCategory\Business\Model\Create;

use App\Model\Dto\CsvDataTransferObject;
use App\Model\Dto\CategoryDataTransferObject;
use App\Model\Entity\Category as CategoryEntity;
use App\Model\CategoryEntityManagerInterface;
use App\Model\CategoryRepositoryInterface;

class Category implements CategoryInterface
{
    private CategoryRepositoryInterface $categoryRepository;
    private CategoryEntityManagerInterface $categoryEntityManager;

    public function __construct(CategoryRepositoryInterface $categoryRepository, CategoryEntityManagerInterface $categoryEntityManager)
    {
        $this->categoryRepository = $categoryRepository;
        $this->categoryEntityManager = $categoryEntityManager;
    }

    public function createCategory(CsvDataTransferObject $csvDTO) : ?CsvDataTransferObject
    {
        if ($csvDTO->getCategoryKey() === '') {
            throw new \Exception('CategoryKey must not be empty', 1);
        }

        $categoryFromRepository = $this->categoryRepository->getCategoryByKey($csvDTO->getCategoryKey());
        if ($categoryFromRepository instanceof CategoryEntity) {
            $csvDTO->setCategoryId($categoryFromRepository->getCategoryId());
            return $csvDTO;
        }
        $categoryDTO = new CategoryDataTransferObject();
        $categoryDTO->setCategoryKey($csvDTO->getCategoryKey());
        $csvDTO->setCategoryId($this->categoryEntityManager->save($categoryDTO)->getCategoryId());

        return $csvDTO;
    }
}
