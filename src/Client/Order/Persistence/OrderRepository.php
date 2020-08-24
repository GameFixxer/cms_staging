<?php
declare(strict_types=1);

namespace App\Client\Order\Persistence;

use App\Client\Order\Persistence\Entity\Order;
use App\Client\Order\Persistence\Mapper\OrderMapperInterface;
use App\Generated\OrderDataProvider;

class OrderRepository implements OrderRepositoryInterface
{
    private OrderMapperInterface $orderMapper;
    private \Cycle\ORM\RepositoryInterface $repository;

    public function __construct(OrderMapperInterface $orderMapper, \Cycle\ORM\ORM $ORM)
    {
        $this->orderMapper = $orderMapper;
        $this->repository = $ORM->getRepository(Order::class);
    }

    /**
     * @return OrderDataProvider[]
     */
    public function getList(): array
    {
        $orderList = [];

        $orderEntityList = (array)$this->repository->select()->fetchALl();
        /** @var  Order $order */
        foreach ($orderEntityList as $order) {
            $orderList[] = $this->orderMapper->map($order);
        }

        return $orderList;
    }

    public function get(int $orderId): ?OrderDataProvider
    {
        $order = $this->repository->findByPK($orderId);
        if ($order instanceof Order) {
            return $this->orderMapper->map($order);
        }
        return null;
    }

    public function getWithDateAndUserId(int $userId, string $dateOfOrder): ?OrderDataProvider
    {
        $order = $this->repository->findOne(['user_id'=>$userId, 'date_of_order'=> $dateOfOrder]);
        if ($order instanceof Order) {
            return $this->orderMapper->map($order);
        }
        return null;
    }
}
