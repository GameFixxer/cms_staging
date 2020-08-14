<?php


namespace App\Tests\integration\Model;

use App\Client\Attribute\Persistence\Entity\Attribute;

use App\Service\DatabaseManager;
use App\Tests\integration\Helper\ContainerHelper;
use Cycle\ORM\Transaction;



/**
 * @group Attribute
 */

class AttributeRepositoryTest extends \Codeception\Test\Unit
{
    private ContainerHelper $container;
    private Transaction $transaction;
    private \Cycle\ORM\RepositoryInterface $ormAttributeRepository;
    private Attribute $entity;

    public function _before()
    {
        $this->container = new ContainerHelper();

        $databaseManager = new DatabaseManager();

        $orm = $databaseManager->connect();

        $this->ormAttributeRepository = $orm->getRepository(Attribute::class);

        $this->transaction = new Transaction($orm);
        $this->transaction->persist($this->createAttributeEntity());
        $this->transaction->run();
    }

    public function _after()
    {
        if ($this->ormAttributeRepository->findOne(['attribute_key'=>$this->entity->getAttributeKey()]) instanceof Attribute) {
            $this->transaction->delete($this->ormAttributeRepository->findOne(['attribute_key'=>$this->entity->getAttributeKey()]));
            $this->transaction->run();
        }
    }

    public function testGetProductWithExistingProduct()
    {
        $attributeRepository = $this->container->getAttributeRepository();

        $productDtoFromRepository = $attributeRepository->getAttribute($this->entity->getAttributeKey());

        $this->assertSame($this->entity->getAttributeKey(), $productDtoFromRepository->getAttributeKey());
        $this->assertSame($this->entity->getAttributeValue(), $productDtoFromRepository->getAttributeValue());
        $this->assertSame($this->entity->getAttributeId(), $productDtoFromRepository->getAttributeId());
    }

    public function testGetProductWithNonExistingProduct()
    {
        $attributeRepository = $this->container->getAttributeRepository();

        $this->assertNull($attributeRepository->getAttribute('0'));
    }

    public function testGetLastProductOfProductListWithNonEmptyDatabase()
    {
        $attributeRepository = $this->container->getAttributeRepository();

        $productListFromProductRepository = $attributeRepository->getAttributeList();

        $lastProductOfProductRepositoryList = end($productListFromProductRepository);

        $this->assertSame($this->entity->getAttributeKey(), $lastProductOfProductRepositoryList->getAttributeKey());
        $this->assertSame($this->entity->getAttributeValue(), $lastProductOfProductRepositoryList->getAttributeValue());
        $this->assertSame($this->entity->getAttributeId(), $lastProductOfProductRepositoryList->getAttributeId());
    }

    private function createAttributeEntity() :Attribute
    {
        $this->entity = new Attribute();
        $this->entity->setAttributeKey('mouse');
        $this->entity->setAttributeValue('mouse2');

        return $this->entity;
    }
}
