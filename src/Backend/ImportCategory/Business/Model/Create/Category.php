<?php
declare(strict_types=1);


namespace App\Backend\ImportCategory\Business\Model\Create;

use App\Client\Category\Business\CategoryBusinessFacadeInterface;
use App\Client\Category\Persistence\Entity\Category as CategoryEntity;
use App\Generated\Dto\CategoryDataTransferObject;
use App\Generated\Dto\CsvCategoryDataTransferObject;

class Category implements CategoryInterface
{
    private CategoryBusinessFacadeInterface $categoryBusinessFacade;

    public function __construct(CategoryBusinessFacadeInterface $categoryBusinessFacade)
    {
        $this->categoryBusinessFacade = $categoryBusinessFacade;
    }

    public function createCategory(CsvCategoryDataTransferObject $csvDTO) : ?CsvCategoryDataTransferObject
    {
        if ($csvDTO->getCategoryKey() === '') {
            throw new \Exception('CategoryKey must not be empty', 1);
        }

        $categoryFromRepository = $this->categoryBusinessFacade->getByKey($csvDTO->getCategoryKey());
        if ($categoryFromRepository instanceof CategoryEntity) {
            $csvDTO->setId($categoryFromRepository->getCategoryId());
            return $csvDTO;
        }
        $categoryDTO = new CategoryDataTransferObject();
        $categoryDTO->setCategoryKey($csvDTO->getCategoryKey());
        $csvDTO->setId($this->categoryBusinessFacade->save($categoryDTO)->getCategoryId());

        return $csvDTO;
    }
}
