<?php
declare(strict_types=1);


namespace App\Backend\ImportCategory\Business\Model\Create;

use App\Client\Category\Business\CategoryBusinessFacadeInterface;
use App\Client\Category\Persistence\Entity\Category as CategoryEntity;
use App\Generated\Dto\CategoryDataTransferObject;
use App\Generated\Dto\CsvCategoryDataTransferObject;

class Category implements CategoryInterface
{
    /**
     * @var \App\Client\Category\Business\CategoryBusinessFacadeInterface
     */
    private CategoryBusinessFacadeInterface $categoryBusinessFacade;

    /**
     * @param \App\Client\Category\Business\CategoryBusinessFacadeInterface $categoryBusinessFacade
     */
    public function __construct(CategoryBusinessFacadeInterface $categoryBusinessFacade)
    {
        $this->categoryBusinessFacade = $categoryBusinessFacade;
    }

    /**
     * @param \App\Generated\Dto\CsvCategoryDataTransferObject $csvDTO
     * @return \App\Generated\Dto\CsvCategoryDataTransferObject|null
     * @throws \Exception
     */
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
