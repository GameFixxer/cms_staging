<?php
declare(strict_types=1);


namespace App\Backend\ImportCategory\Business\Model\Create;

use App\Client\Category\Business\CategoryBusinessFacadeInterface;
use App\Client\Category\Persistence\Entity\Category as CategoryEntity;
use App\Generated\CategoryDataProvider;
use App\Generated\CsvCategoryDataProvider;

class Category implements CategoryInterface
{
    private CategoryBusinessFacadeInterface $categoryBusinessFacade;

    public function __construct(CategoryBusinessFacadeInterface $categoryBusinessFacade)
    {
        $this->categoryBusinessFacade = $categoryBusinessFacade;
    }

    public function createCategory(CsvCategoryDataProvider $csvDTO) : ?CsvCategoryDataProvider
    {
        if ($csvDTO->getCategoryKey() === '') {
            throw new \Exception('CategoryKey must not be empty', 1);
        }

        $categoryFromRepository = $this->categoryBusinessFacade->getByKey($csvDTO->getCategoryKey());
        if ($categoryFromRepository instanceof CategoryEntity) {
            $csvDTO->setCategoryId($categoryFromRepository->getCategoryId());
            return $csvDTO;
        }
        $categoryDTO = new CategoryDataProvider();
        $categoryDTO->setCategoryKey($csvDTO->getCategoryKey());
        $csvDTO->setCategoryId($this->categoryBusinessFacade->save($categoryDTO)->getCategoryId());

        return $csvDTO;
    }
}
