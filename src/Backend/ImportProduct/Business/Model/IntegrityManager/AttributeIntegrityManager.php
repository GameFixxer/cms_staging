<?php


namespace App\Backend\ImportProduct\Business\Model\IntegrityManager;

use App\Client\Attribute\Persistence\Entity\Attribute;
use App\Generated\AttributeDataProvider;
use App\Generated\CsvProductDataProvider;
use App\Client\Attribute\Business\AttributeBusinessFacadeInterface;
use Cycle\ORM\ORM;

class AttributeIntegrityManager implements IntegrityManagerInterface
{
    private \Cycle\ORM\RepositoryInterface $ormAttributeRepository;
    private AttributeBusinessFacadeInterface $attributeBusinessFacade;

    public function __construct(ORM $ormAttributeRepository , AttributeBusinessFacadeInterface $attributeBusinessFacade)
    {
        $this->ormAttributeRepository = $ormAttributeRepository->getRepository(Attribute::class);
        $this->attributeBusinessFacade =$attributeBusinessFacade;
    }

    public function mapEntity(CsvProductDataProvider $csvDTO): ?AttributeDataProvider
    {
        $categoryEntity = $this->loadEntityFromRepository($csvDTO->getAttributeKey());
        if ($categoryEntity instanceof AttributeDataProvider) {
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
        return $this->attributeBusinessFacade->get($key);
    }
}
