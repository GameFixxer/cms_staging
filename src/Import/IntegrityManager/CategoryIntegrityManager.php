<?php
declare(strict_types=1);
namespace App\Import\IntegrityManager;

use App\Model\Dto\CsvDataTransferObject;
use App\Model\Entity\Category;

use function PHPUnit\Framework\isEmpty;

class CategoryIntegrityManager implements CategoryIntegrityManagerInterface
{
    private \Cycle\ORM\RepositoryInterface $ormCategoryRepository;

    public function __construct(\Cycle\ORM\RepositoryInterface $ormCategoryRepository)
    {
        $this->ormCategoryRepository = $ormCategoryRepository;
    }

    public function mapEntity(CsvDataTransferObject $csvDTO): ?object
    {
        $categoryEntity = $this->loadEntityFromRepository($csvDTO->getCategoryId());
        if ($categoryEntity instanceof Category) {
            $listOfMethods = get_class_methods($categoryEntity);

            foreach ($listOfMethods as $method) {
                if (str_starts_with($method, 'set')) {
                    $stringWithSet = str_replace('set', 'get', $method);
                    $categoryEntity ->$method($csvDTO->$stringWithSet());
                }
            }
        }
        return $categoryEntity;
    }


    private function loadEntityFromRepository(int $id): ?object
    {
        return $this->ormCategoryRepository->findByPK($id);
    }
}
