<?php
declare(strict_types=1);

namespace App\Client\Order\Business;

use App\Client\Order\Persistence\OrderEntityManagerInterface;
use App\Client\Order\Persistence\OrderRepositoryInterface;
use App\Generated\Dto\OrderDataTransferObject;

class OrderBusinessFacade implements OrderBusinessFacadeInterface
{
    private OrderRepositoryInterface $orderRepository;
    private OrderEntityManagerInterface $orderEntityManager;

    public function __construct(OrderRepositoryInterface $orderRepository, OrderEntityManagerInterface $orderEntityManager)
    {
        $this->orderRepository = $orderRepository;
        $this->orderEntityManager = $orderEntityManager;
    }

    public function get(int $orderId): ?OrderDataTransferObject
    {
        return $this->orderRepository->getOrder($orderId);
    }

    /**
     * @return OrderDataTransferObject[]
     */

    public function getList():array
    {
        return$this->orderRepository->getOrderList();
    }
    public function save(OrderDataTransferObject $order):OrderDataTransferObject
    {
        return $this->orderEntityManager->save($order);
    }
    public function delete(OrderDataTransferObject $order)
    {
        $this->orderEntityManager->delete($order);
    }
}
