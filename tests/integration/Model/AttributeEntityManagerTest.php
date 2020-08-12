<?php


namespace App\Tests\integration\Model;

use App\Client\Attribute\Persistence\Entity\Attribute;
use App\Generated\AttributeDataProvider;
use App\Service\DatabaseManager;
use App\Tests\integration\Helper\ContainerHelper;
use Cycle\ORM\Transaction;


/**
 * @group Attribute
 */

class AttributeEntityManagerTest extends \Codeception\Test\Unit
{
    private AttributeDataProvider $attributeDto;
    private ContainerHelper $container;
    private Transaction $transaction;
    private \Cycle\ORM\RepositoryInterface $ormAttributeRepository;
    private $attributeEntityManager;

    public function _before()
    {
        $this->container = new ContainerHelper();

        $databaseManager = new DatabaseManager();

        $orm = $databaseManager->connect();

        $this->ormAttributeRepository = $orm->getRepository(Attribute::class);

        $this->attributeEntityManager = $this->container->getAttributeEntityManager();
        $this->transaction = new Transaction($orm);
        $this->createDto('fu', 'ba');
    }

    public function _after()
    {
        if ($this->ormAttributeRepository->findOne(['attribute_key'=>$this->attributeDto->getAttributeKey()]) instanceof Attribute) {
            $this->transaction->delete($this->ormAttributeRepository->findOne(['attribute_key'=>$this->attributeDto->getAttributeKey()]));
            $this->transaction->run();
        }
    }

    public function testCreateAttribute()
    {
        $this->attributeDto->setAttributeId(($this->attributeEntityManager->save($this->attributeDto))->getAttributeId());

        $attributeFromRepository = $this->container->getAttributeRepository()->getAttribute($this->attributeDto->getAttributeKey());

        $this->assertSame($this->attributeDto->getAttributeKey(), $attributeFromRepository->getAttributeKey());
        $this->assertSame($this->attributeDto->getAttributeValue(), $attributeFromRepository->getAttributeValue());
        $this->assertSame($this->attributeDto->getAttributeId(), $attributeFromRepository->getAttributeId());
    }

    public function testUpdateAttribute()
    {
        $this->attributeDto->setAttributeKey('fabulous');
        $this->attributeDto->setAttributeValue('even more fabulous');
        $this->attributeDto = $this->attributeEntityManager->save($this->attributeDto);
        $attributeFromRepository = $this->container->getAttributeRepository()->getAttribute($this->attributeDto->getAttributeKey());

        $this->assertSame($this->attributeDto->getAttributeKey(), $attributeFromRepository->getAttributeKey());
        $this->assertSame($this->attributeDto->getAttributeValue(), $attributeFromRepository->getAttributeValue());
        $this->assertSame($this->attributeDto->getAttributeId(), $attributeFromRepository->getAttributeId());
    }

    public function TestDeleteProduct()
    {
        $this->testCreateAttribute();

        $this->attributeEntityManager->delete($this->attributeDto);

        $this->assertNull($this->container->getProductRepository()->getProduct($this->attributeDto->getAttributeId()));
    }

    private function createDto(String $name, String $description)
    {
        $this->attributeDto = new AttributeDataProvider;
        $this->attributeDto->setAttributeKey($name);
        $this->attributeDto->setAttributeValue($description);
    }
}
