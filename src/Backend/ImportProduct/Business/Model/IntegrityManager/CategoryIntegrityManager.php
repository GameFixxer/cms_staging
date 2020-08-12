<?php
declare(strict_types=1);
namespace App\Backend\ImportProduct\Business\Model\IntegrityManager;

use App\Client\Category\Business\CategoryBusinessFacadeInterface;
use App\Client\Category\Persistence\Entity\Category;
use App\Generated\CategoryDataProvider;
use App\Generated\CsvProductDataProvider;

class CategoryIntegrityManager implements IntegrityManagerInterface
{
    private \Cycle\ORM\RepositoryInterface $ormCategoryRepository;
    private CategoryBusinessFacadeInterface $categoryBusinessFacade;

    public function __construct(\Cycle\ORM\ORM $ormCategoryRepository, CategoryBusinessFacadeInterface $categoryBusinessFacade)
    {
        $this->ormCategoryRepository = $ormCategoryRepository->getRepository(Category::class);
        $this->categoryBusinessFacade = $categoryBusinessFacade;
    }

    public function mapEntity(CsvProductDataProvider $csvDTO): ?CategoryDataProvider
    {
        $categoryEntity = $this->loadEntityFromRepository($csvDTO->getCategoryId());
        if ($categoryEntity instanceof CategoryDataProvider) {
            $listOfMethods = get_class_methods($categoryEntity);

            foreach ($listOfMethods as $method) {
                if (empty($csvDTO->getCategoryKey())) {
                    throw new \Exception('Critical Integrity Error', 1);
                }
                $categoryEntity->setCategoryKey($csvDTO->getCategoryKey());
            }
        }

        return $categoryEntity;
    }


    private function loadEntityFromRepository(int $id): ?object
    {
        return $this->categoryBusinessFacade->get($id);
    }
}
