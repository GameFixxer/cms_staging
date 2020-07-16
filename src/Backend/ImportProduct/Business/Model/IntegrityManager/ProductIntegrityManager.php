<?php


namespace App\Backend\ImportProduct\Business\Model\IntegrityManager;

use App\Client\Product\Persistence\Entity\Product;
use App\Generated\Dto\CsvProductDataTransferObject;

class ProductIntegrityManager implements IntegrityManagerInterface
{
    private \Cycle\ORM\RepositoryInterface $ormProductRepository;

    public function __construct(\Cycle\ORM\ORM $ormProductRepository)
    {
        $this->ormProductRepository = $ormProductRepository->getRepository(Product::class);
    }

    public function mapEntity(CsvProductDataTransferObject $csvDTO): ?object
    {
        $productEntity = $this->loadEntityFromRepository($csvDTO->getCategoryId());
        if ($productEntity instanceof Product) {
            $listOfMethods = get_class_methods($productEntity);

            foreach ($listOfMethods as $method) {
                if (str_starts_with($method, 'set')) {
                    $stringWithSet = str_replace('set', 'get', $method);
                    $strRplCategory = str_replace('Category', '', $stringWithSet);
                    $productEntity->$method($csvDTO->$strRplCategory());
                }
            }
        }
        return $productEntity;
    }


    private function loadEntityFromRepository(int $id): ?object
    {
        return $this->ormProductRepository->findByPK($id);
    }
}
