<?php


namespace App\Tests\integration\Model;

use App\Client\Address\Persistence\Entity\Address;
use App\Client\Order\Persistence\Entity\Order;
use App\Client\User\Persistence\Entity\User;
use App\Service\DatabaseManager;
use App\Tests\integration\Helper\ContainerHelper;
use Cycle\ORM\Transaction;

/**
 * @group order
 */

class OrderRepositoryTest extends \Codeception\Test\Unit
{
    private ContainerHelper $container;
    private Transaction $transaction;
    private \Cycle\ORM\RepositoryInterface $ormAttributeRepository;
    private Order $entity;
    private Address $address;
    private User $user;

    public function _before()
    {
        $this->container = new ContainerHelper();

        $databaseManager = new DatabaseManager();

        $orm = $databaseManager->connect();

        $this->ormAttributeRepository = $orm->getRepository(Order::class);

        $this->transaction = new Transaction($orm);
        $this->transaction->persist($this->createUserEntity());
        $this->transaction->run();
        $this->transaction->persist($this->createAddressEntity());
        $this->transaction->run();
        $this->transaction->persist($this->createOrderEntity());
        $this->transaction->run();
    }

    public function _after()
    {
        if ($this->ormAttributeRepository->findByPK($this->entity->getOrderId()) instanceof Order) {
            $this->transaction->delete($this->ormAttributeRepository->findByPK($this->entity->getOrderId()));
            $this->transaction->run();
        }
    }

    public function testGetOrderWithExistingOrder()
    {
        $orderRepository = $this->container->getOrderRepository();

        $productDtoFromRepository = $orderRepository->getOrder($this->entity->getOrderId());

        $this->assertSame($this->entity->getOrderId(), $productDtoFromRepository->getId());
        $this->assertSame(
            $this->entity->getDateOfOrder()->format('Y-m-d'),
            $productDtoFromRepository->getDateofOrder()->format('Y-m-d')
        );
        codecept_debug($this->entity->getAddress());
        $this->assertSame($this->entity->getAddress()->getAddressId(), $productDtoFromRepository->getAddress()->getAddress_id());
        $this->assertSame($this->entity->getUser()->getUserId(), $productDtoFromRepository->getUser()->getId());
        $this->assertSame($this->entity->getSum(), $productDtoFromRepository->getSum());
        $this->assertSame($this->entity->getStatus(), $productDtoFromRepository->getStatus());
        $this->assertSame($this->entity->getOrderedProducts(), $productDtoFromRepository->getShoppingCard());
    }

    public function testGetProductWithNonExistingProduct()
    {
        $attributeRepository = $this->container->getOrderRepository();

        $this->assertNull($attributeRepository->getOrder('0'));
    }

    public function testGetLastProductOfProductListWithNonEmptyDatabase()
    {
        $orderRepository = $this->container->getOrderRepository();

        $orderList = $orderRepository->getOrderList();

        $lastOrderOfOrderRepositoryList = end($orderList);

        $this->assertSame($this->entity->getOrderId(), $lastOrderOfOrderRepositoryList->getId());
        $this->assertSame(
            $this->entity->getDateOfOrder()->format('Y-m-d'),
            $lastOrderOfOrderRepositoryList->getDateofOrder()->format('Y-m-d')
        );
        $this->assertSame($this->entity->getAddress(), $lastOrderOfOrderRepositoryList->getAddress());
        $this->assertSame($this->entity->getUser(), $lastOrderOfOrderRepositoryList->getUser());
        $this->assertSame($this->entity->getSum(), $lastOrderOfOrderRepositoryList->getSum());
        $this->assertSame($this->entity->getStatus(), $lastOrderOfOrderRepositoryList->getStatus());
        $this->assertSame($this->entity->getOrderedProducts(), $lastOrderOfOrderRepositoryList->getShoppingCard()s());
    }

    private function createOrderEntity() :Order
    {
        $date = new  \DateTimeImmutable;
        $date->setDate(date("Y", time()), date("m", time()), date("d", time()));
        $this->entity = new Order();
        $this->entity->setDateOfOrder($date);
        $this->entity->setUser($this->user);
        $this->entity->setAddress($this->address);
        $this->entity->setSum(0);
        $this->entity->setStatus('shipping');
        $this->entity->setOrderedProducts("");

        return $this->entity;
    }

    private function createUserEntity():User
    {
        $this->user = new User();
        $this->user->setAddress(null);
        $this->user->setShoppingCard(null);
        $this->user->setPassword("1243");
        $this->user->setRole("root");
        $this->user->setSessionId("");
        $this->user->setResetPassword('');
        $this->user->setUsername('tester123');
        return $this->user;
    }
    private function createAddressEntity():Address
    {
        $this->address = new Address();
        $this->address->setUser($this->user);
        $this->address->setActive("active");
        $this->address->setCountry("Germany");
        $this->address->setPostCode(42178);
        $this->address->setTown("Leichlingen");
        $this->address->setStreet("Bremsen6a");
        $this->address->setType("");
        return $this->address;
    }
}
