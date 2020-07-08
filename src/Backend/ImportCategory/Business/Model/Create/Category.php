<?php
declare(strict_types=1);


namespace App\Backend\ImportCategory\Business\Model\Create;

use App\Client\Category\Business\CategoryBusinessFacadeInterface;
use App\Model\Dto\CsvDataTransferObject;
use App\Model\Dto\CategoryDataTransferObject;
use App\Client\Category\Persistence\Entity\Category as CategoryEntity;

class Category implements CategoryInterface
{
    private CategoryBusinessFacadeInterface $categoryBusinessFacade;

    public function __construct(CategoryBusinessFacadeInterface $categoryBusinessFacade)
    {
        $this->$categoryBusinessFacade =$categoryBusinessFacade;
    }

    public function createCategory(CsvDataTransferObject $csvDTO) : ?CsvDataTransferObject
    {
        if ($csvDTO->getCategoryKey() === '') {
            throw new \Exception('CategoryKey must not be empty', 1);
        }

        $categoryFromRepository = $this->categoryBusinessFacade->getByKey($csvDTO->getCategoryKey());
        if ($categoryFromRepository instanceof CategoryEntity) {
            $csvDTO->setCategoryId($categoryFromRepository->getCategoryId());
            return $csvDTO;
        }
        $categoryDTO = new CategoryDataTransferObject();
        $categoryDTO->setCategoryKey($csvDTO->getCategoryKey());
        $csvDTO->setCategoryId($this->categoryBusinessFacade->save($categoryDTO)->getCategoryId());

        return $csvDTO;
    }
}
