<?php


namespace App\Tests\integration\Model;

use App\Client\Order\Persistence\Entity\Order;
use App\Client\User\Persistence\UserEntityManagerInterface;
use App\Generated\AddressDataProvider;
use App\Generated\OrderDataProvider;
use App\Generated\ShoppingCardDataProvider;
use App\Generated\UserDataProvider;
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
    private UserEntityManagerInterface $userBusinessFace;
    private $addressBusinessFace;
    private OrderDataProvider $entity;
    private AddressDataProvider $address;
    private UserDataProvider $user;
    private $orderEntityManager;
    private $shoppingCardEntityManager;
    private ShoppingCardDataProvider $shoppingCard;

    public function _before()
    {
        $this->container = new ContainerHelper();

        $databaseManager = new DatabaseManager();

        $orm = $databaseManager->connect();
        $this->transaction = new Transaction($orm);
        $this->ormAttributeRepository = $orm->getRepository(Order::class);
        $this->shoppingCardEntityManager = $this->container->getShoppingCardEntityManager();
        $this->orderEntityManager = $this->container->getOrderEntityManager();
        $this->userBusinessFace = $this->container->getUserEntityManager();
        $this->addressBusinessFace = $this->container->getAddressEntityManager();
        $this->user = $this->userBusinessFace->save($this->createUser());
        $this->address = $this->addressBusinessFace->save($this->createAddressEntity());
        $this->shoppingCard = $this->shoppingCardEntityManager->save($this->createShoppingCard());
        $this->entity = $this->orderEntityManager->save($this->createOrderEntity());

    }

    public function _after()
    {
        if ($this->ormAttributeRepository->findByPK($this->entity->getId()) instanceof Order) {
            $this->transaction->delete($this->ormAttributeRepository->findByPK($this->entity->getId()));
            $this->transaction->run();
        }
    }

    public function testGetOrderWithExistingOrder()
    {
        $orderRepository = $this->container->getOrderRepository();

        $productDtoFromRepository = $orderRepository->get($this->entity->getId());

        $this->assertSame($this->entity->getId(), $productDtoFromRepository->getId());
        $this->assertSame($this->entity->getAddress()->getAddress_id(), $productDtoFromRepository->getAddress()->getAddress_id());
        $this->assertSame($this->entity->getUser()->getId(), $productDtoFromRepository->getUser()->getId());
        $this->assertSame($this->entity->getSum(), $productDtoFromRepository->getSum());
        $this->assertSame($this->entity->getStatus(), $productDtoFromRepository->getStatus());
        $this->assertSame($this->entity->getShoppingCard()->getId(), $productDtoFromRepository->getShoppingCard()->getId());
    }

    public function testGetProductWithNonExistingProduct()
    {
        $attributeRepository = $this->container->getOrderRepository();

        $this->assertNull($attributeRepository->get(0));
    }

    public function testGetLastProductOfProductListWithNonEmptyDatabase()
    {
        $orderRepository = $this->container->getOrderRepository();

        $orderList = $orderRepository->getList();

        $lastOrderOfOrderRepositoryList = end($orderList);

        $this->assertSame($this->entity->getAddress()->getAddress_id(), $lastOrderOfOrderRepositoryList->getAddress()->getAddress_id());
        $this->assertSame($this->entity->getUser()->getId(), $lastOrderOfOrderRepositoryList->getUser()->getId());
        $this->assertSame($this->entity->getSum(), $lastOrderOfOrderRepositoryList->getSum());
        $this->assertSame($this->entity->getStatus(), $lastOrderOfOrderRepositoryList->getStatus());
        $this->assertSame($this->entity->getShoppingCard()->getId(), $lastOrderOfOrderRepositoryList->getShoppingCard()->getId());
    }

    private function createOrderEntity() :OrderDataProvider
    {
        $date = "".getdate()['year'].'-'.getdate()['mon'].'-'.getdate()['mday'];
        $this->entity = new OrderDataProvider();
        $this->entity->setDateOfOrder($date);
        $this->entity->setUser($this->user);
        $this->entity->setAddress($this->address);
        $this->entity->setSum(0);
        $this->entity->setStatus('shipping');
        $this->entity->setShoppingCard($this->createShoppingCard());
        $this->entity->setId(0);

        return $this->entity;
    }

    private function createUser():UserDataProvider
    {
        $this->user = new UserDataProvider();
        $this->user->setShoppingcardId(0);
        $this->user->setPassword("1243");
        $this->user->setRole("root");
        $this->user->setSessionId("");
        $this->user->setResetPassword('');
        $this->user->setUsername('tester123');
        return $this->user;
    }
    private function createAddressEntity():AddressDataProvider
    {
        $this->address = new AddressDataProvider();
        $this->address->setUser($this->user);
        $this->address->setCountry("Germany");
        $this->address->setPostCode(42178);
        $this->address->setTown("Leichlingen");
        $this->address->setStreet("Bremsen6a");
        $this->address->setType("");
        $this->address->setFirstName("abc");
        $this->address->setLastName('123');
        $this->address->setAddress_id(0);
        return $this->address;
    }

    private function createShoppingCard():ShoppingCardDataProvider
    {
        $this->shoppingCard = new ShoppingCardDataProvider();
        $this->shoppingCard->setProduct([]);
        $this->shoppingCard->setQuantity(0);
        $this->shoppingCard->setSum(0);
        $this->shoppingCard->setUser($this->user);
        $this->shoppingCard->setId(0);
        return $this->shoppingCardEntityManager->save($this->shoppingCard);
    }
}
