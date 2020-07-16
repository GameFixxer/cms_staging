<?php
declare(strict_types=1);
namespace App\Backend\ImportProduct\Business\Model\IntegrityManager;



use App\Client\Category\Persistence\Entity\Category;
use App\Generated\Dto\CsvDataTransferObject;
use App\Generated\Dto\CsvProductDataTransferObject;
use function PHPUnit\Framework\isEmpty;

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
                if (str_starts_with($method, 'set')) {
                    $stringWithSet = str_replace('set', 'get', $method);
                    $strRplCategory = str_replace('Category', '', $stringWithSet);
                    $categoryEntity ->$method($csvDTO->$strRplCategory());
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
