<?php


namespace App\Client\Attribute\Persistence;

use App\Client\Attribute\Persistence\Entity\Attribute;
use App\Generated\Dto\AttributeDataTransferObject;
use Cycle\ORM\ORM;
use Cycle\ORM\Transaction;

class AttributeEntityManager implements AttributeEntityManagerInterface
{

    /**
     * @var AttributeRepository
     */
    private AttributeRepository $attributeRepository;
    private \Cycle\ORM\RepositoryInterface $ormAttributeRepository;

    private ORM $orm;

    public function __construct(ORM $orm, AttributeRepository $attributeRepository)
    {
        $this->attributeRepository = $attributeRepository;
        $this->orm = $orm;
        $this->ormAttributeRepository = $orm->getRepository(Attribute::class);
    }



    public function delete(AttributeDataTransferObject $attribute):void
    {
        $transaction = new Transaction($this->orm);
        $transaction->delete($this->ormAttributeRepository->findOne(['attribute_key'=>$attribute
            ->getKey()]));
        $transaction->run();

        $this->attributeRepository->getAttributeList();
    }

    public function save(AttributeDataTransferObject $attribute): AttributeDataTransferObject
    {
        $transaction = new Transaction($this->orm);
        $entity = $this->ormAttributeRepository->findOne(['attribute_key'=>$attribute->getKey()]);
        if (!$entity instanceof Attribute) {
            $entity = new Attribute();
        }
        $entity->setAttributeKey($attribute->getKey());
        $entity->setAttributeValue($attribute->getValue());
        $transaction->persist($entity);
        $transaction->run();

        $attribute->setId($entity->getAttributeId());

        return $attribute;
    }
}
