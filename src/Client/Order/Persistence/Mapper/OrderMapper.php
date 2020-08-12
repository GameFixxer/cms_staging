<?php
declare(strict_types=1);

namespace App\Client\Order\Persistence\Mapper;

use App\Client\Order\Persistence\Entity\Order;
use App\Generated\OrderDataProvider;

class OrderMapper implements OrderMapperInterface
{
    public function map(Order $order): OrderDataProvider
    {
        $orderDataTransferObject = new   OrderDataProvider();
        $orderDataTransferObject->setId($order->getOrderId());
        $orderDataTransferObject->setStatus($order->getStatus());
        $orderDataTransferObject->setUser($order->getUser());
        $orderDataTransferObject->setSum($order->getSum());
        $orderDataTransferObject->setAddress($order->getAddress());
        $orderDataTransferObject->setDateOfOrder($order->getDateOfOrder());
        $orderDataTransferObject->setShoppingCard($order->getShoppingCard);

        return $orderDataTransferObject;
    }
}
