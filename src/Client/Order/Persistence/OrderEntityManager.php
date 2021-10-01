<?php
declare(strict_types=1);

namespace App\Client\Order\Persistence;

use App\Client\Order\Persistence\Entity\Order;
use App\Generated\Dto\OrderDataTransferObject;
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

    /**
     * @param \Cycle\ORM\ORM $orm
     * @param \App\Client\Order\Persistence\OrderRepository $orderRepository
     */
    public function __construct(ORM $orm, OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->orm = $orm;
        $this->repository = $orm->getRepository(Order::class);
    }


    /**
     * @param \App\Generated\Dto\OrderDataTransferObject $order
     */
    public function delete(OrderDataTransferObject $order):void
    {
        $transaction = new Transaction($this->orm);
        $transaction->delete($this->repository->findOne(['orderId'=>$order->getOrderId()]));
        $transaction->run();

        $this->orderRepository->getOrderList();
    }

    /**
     * @param \App\Generated\Dto\OrderDataTransferObject $order
     * @return \App\Generated\Dto\OrderDataTransferObject
     */
    public function save(OrderDataTransferObject $order): OrderDataTransferObject
    {
        $transaction = new Transaction($this->orm);


        $entity = $this->repository->findByPK($order->getOrderId());
        if (!$entity instanceof Order) {
            $entity = new Order();
        }
        $entity->setOrderId($order->getOrderId());
        $entity->setStatus($order->getStatus());
        $entity->setUser($order->getUser());
        $entity->setSum($order->getSum());
        $entity->setAddress($order->getAddress());
        $entity->setDateOfOrder($order->getDateOfOrder());
        $entity->setOrderedProducts($order->getOrderedProducts());


        $transaction->persist($entity);
        $transaction->run();
        $order->setOrderId($entity->getOrderId());

        return $order;
    }
}
