<?php
declare(strict_types=1);

namespace App\Client\Order\Persistence\Mapper;

use App\Client\Order\Persistence\Entity\Order;
use App\Client\Product\Persistence\Mapper\ProductMapper;
use App\Client\User\Persistence\Mapper\UserMapper;
use App\Generated\Dto\OrderDataTransferObject;

class OrderMapper implements OrderMapperInterface
{
    public function map(Order $order): OrderDataTransferObject
    {
        $orderDataTransferObject = new   OrderDataTransferObject();
        $orderDataTransferObject->setOrderId($order->getOrderId());
        $orderDataTransferObject->setStatus($order->getStatus());
        $orderDataTransferObject->setUser($order->getUser());
        $orderDataTransferObject->setSum($order->getSum());
        $orderDataTransferObject->setAddress($order->getAddress());
        $orderDataTransferObject->setDateOfOrder($order->getDateOfOrder());
        $orderDataTransferObject->setOrderedProducts($order->getOrderedProducts());

        return $orderDataTransferObject;
    }
}
