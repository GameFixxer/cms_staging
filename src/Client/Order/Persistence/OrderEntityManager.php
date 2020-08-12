<?php
declare(strict_types=1);

namespace App\Client\Order\Persistence;

use App\Client\Order\Persistence\Entity\Order;
use App\Generated\OrderDataProvider;
use Cycle\ORM\ORM;
use Cycle\ORM\Transaction;

class OrderEntityManager implements OrderEntityManagerInterface
{
    /**
     * @var OrderRepository
     */
    private OrderRepository $orderRepository;
    private \Cycle\ORM\RepositoryInterface $repository;

    private ORM $orm;

    public function __construct(ORM $orm, OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->orm = $orm;
        $this->repository = $orm->getRepository(Order::class);
    }



    public function delete(OrderDataProvider $order):void
    {
        $transaction = new Transaction($this->orm);
        $transaction->delete($this->repository->findOne(['orderId'=>$order->getId()]));
        $transaction->run();

        $this->orderRepository->getOrderList();
    }

    public function save(OrderDataProvider $order): OrderDataProvider
    {
        $transaction = new Transaction($this->orm);


        $entity = $this->repository->findByPK($order->getId());
        if (!$entity instanceof Order) {
            $entity = new Order();
        }
        $entity->setOrderId($order->getId());
        $entity->setStatus($order->getStatus());
        $entity->setUser($order->getUser());
        $entity->setSum($order->getSum());
        $entity->setAddress($order->getAddress());
        $entity->setDateOfOrder($order->getDateOfOrder());
        $entity->setShoppingCard($order->getShoppingCard());


        $transaction->persist($entity);
        $transaction->run();
        $order->setId($entity->getOrderId());

        return $order;
    }
}
