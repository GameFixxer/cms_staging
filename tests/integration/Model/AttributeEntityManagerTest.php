<?php


namespace App\Tests\integration\Model;

use App\Client\Attribute\Persistence\AttributeEntityManager;
use App\Client\Attribute\Persistence\Entity\Attribute;
use App\Client\Product\Persistence\ProductEntityManager;
use App\Generated\Dto\AttributeDataTransferObject;
use App\Generated\Dto\ProductDataTransferObject;
use App\Service\DatabaseManager;
use App\Tests\integration\Helper\ContainerHelper;
use Cycle\ORM\Transaction;
use App\Client\Product\Persistence\Entity\Product;

/**
 * @group Attribute
 */

class AttributeEntityManagerTest extends \Codeception\Test\Unit
{
    private AttributeDataTransferObject $attributeDto;
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
        if ($this->ormAttributeRepository->findOne(['attribute_key'=>$this->attributeDto->getKey()]) instanceof Attribute) {
            $this->transaction->delete($this->ormAttributeRepository->findOne(['attribute_key'=>$this->attributeDto->getKey()]));
            $this->transaction->run();
        }
    }

    public function testCreateAttribute()
    {
        $this->attributeDto->setId( ($this->attributeEntityManager->save($this->attributeDto))->getId());

        $attributeFromRepository = $this->container->getAttributeRepository()->getAttribute($this->attributeDto->getKey());

        $this->assertSame($this->attributeDto->getKey(), $attributeFromRepository->getKey());
        $this->assertSame($this->attributeDto->getValue(), $attributeFromRepository->getValue());
        $this->assertSame($this->attributeDto->getId(), $attributeFromRepository->getId());
    }

    public function testUpdateAttribute()
    {
        $this->attributeDto->setKey('fabulous');
        $this->attributeDto->setValue('even more fabulous');
        $this->attributeDto = $this->attributeEntityManager->save($this->attributeDto);
        $attributeFromRepository = $this->container->getAttributeRepository()->getAttribute($this->attributeDto->getKey());

        $this->assertSame($this->attributeDto->getKey(), $attributeFromRepository->getKey());
        $this->assertSame($this->attributeDto->getValue(), $attributeFromRepository->getValue());
        $this->assertSame($this->attributeDto->getId(), $attributeFromRepository->getId());
    }

    public function TestDeleteProduct()
    {
        $this->attributeDto = $this->testCreateAttribute();

        $this->attributeEntityManager->delete($this->attributeDto);

        $this->assertNull($this->container->getProductRepository()->getProduct($this->attributeDto->getId()));
    }

    private function createDto(String $name, String $description)
    {
        $this->attributeDto = new AttributeDataTransferObject();
        $this->attributeDto->setKey($name);
        $this->attributeDto->setValue($description);
        $this->attributeDto->setProduct(null);
    }
}
