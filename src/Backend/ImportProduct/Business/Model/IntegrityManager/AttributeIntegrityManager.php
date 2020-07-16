<?php


namespace App\Backend\ImportProduct\Business\Model\IntegrityManager;

use App\Client\Attribute\Persistence\Entity\Attribute;
use App\Generated\Dto\CsvProductDataTransferObject;

class AttributeIntegrityManager implements IntegrityManagerInterface
{
    private \Cycle\ORM\RepositoryInterface $ormAttributeRepository;

    public function __construct(\Cycle\ORM\ORM $ormAttributeRepository)
    {
        $this->ormAttributeRepository = $ormAttributeRepository->getRepository(Attribute::class);
    }

    public function mapEntity(CsvProductDataTransferObject $csvDTO): ?object
    {
        $categoryEntity = $this->loadEntityFromRepository($csvDTO->getAttributeKey());
        if ($categoryEntity instanceof Attribute) {
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


    private function loadEntityFromRepository(string $key): ?object
    {
        return $this->ormAttributeRepository->findOne(['attribute_key'=>$key]);
    }
}
