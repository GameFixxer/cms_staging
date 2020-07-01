<?php
declare(strict_types=1);

namespace App\Import;

use App\Model\CategoryEntityManagerInterface;
use App\Model\CategoryRepositoryInterface;
use App\Model\Dto\CategoryDataTransferObject;
use App\Model\Dto\CsvDataTransferObject;

class ImportCategory
{
    private CategoryRepositoryInterface $categoryRepository;
    private CategoryEntityManagerInterface $categoryEntityManager;

    public function __construct(CategoryRepositoryInterface $categoryRepository, CategoryEntityManagerInterface $categoryEntityManager)
    {
        $this->categoryRepository = $categoryRepository;
        $this->categoryEntityManager = $categoryEntityManager;
    }

    public function importCategory(CsvDataTransferObject $csvDTO): void
    {
        $categoryDTO = new CategoryDataTransferObject();
        $listOfMethods = get_class_methods($categoryDTO);

        foreach ($listOfMethods as $method) {
            if (str_starts_with($method, 'set')) {
                $stringWithSet = str_replace('set', 'get', $method);
                $categoryDTO->$method($csvDTO->$stringWithSet());
            }
        }
        if ($categoryDTO->getCategoryKey() !== '' && $this->checkForValidCategorySave($categoryDTO)) {
            $this->categoryEntityManager->save($categoryDTO);
        }
    }

    private function checkForValidCategorySave(CategoryDataTransferObject $category): bool
    {
        $categoryFromRepository = $this->categoryRepository->getCategory($category->getCategoryId());

        if ($categoryFromRepository instanceof CategoryDataTransferObject && !$this->checkForCategoryChanges($categoryFromRepository, $category)) {
            return true;
        } elseif ($category instanceof CategoryDataTransferObject && $categoryFromRepository === null) {
            return true;
        }

        return false;
    }

    private function checkForCategoryChanges(CategoryDataTransferObject $categoryFromRepository, CategoryDataTransferObject $category):bool
    {
        if (
            $categoryFromRepository->getCategoryKey() === $category->getCategoryKey() &&
            $categoryFromRepository->getCategoryId() === $category->getCategoryId()) {
            return true;
        }
        return false;
    }
}
