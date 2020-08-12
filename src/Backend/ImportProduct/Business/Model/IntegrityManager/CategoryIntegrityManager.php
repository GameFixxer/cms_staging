<?php
declare(strict_types=1);
namespace App\Backend\ImportProduct\Business\Model\IntegrityManager;

use App\Client\Category\Persistence\Entity\Category;
use App\Generated\Dto\CsvProductDataTransferObject;

class CategoryIntegrityManager implements IntegrityManagerInterface
{
    private \Cycle\ORM\RepositoryInterface $ormCategoryRepository;

    public function __construct(\Cycle\ORM\ORM $ormCategoryRepository)
    {
        $this->ormCategoryRepository = $ormCategoryRepository->getRepository(Category::class);
    }

    public function mapEntity(CsvProductDataTransferObject $csvDTO): ?object
    {
        $categoryEntity = $this->loadEntityFromRepository($csvDTO->getCategoryId());
        if ($categoryEntity instanceof Category) {
            $listOfMethods = get_class_methods($categoryEntity);

            foreach ($listOfMethods as $method) {
                if (empty($csvDTO->getKey())) {
                    throw new \Exception('Critical Integrity Error', 1);
                }
                $categoryEntity->setCategoryKey($csvDTO->getKey());
            }
        }

        return $categoryEntity;
    }


    private function loadEntityFromRepository(int $id): ?object
    {
        return $this->ormCategoryRepository->findByPK($id);
    }
}
