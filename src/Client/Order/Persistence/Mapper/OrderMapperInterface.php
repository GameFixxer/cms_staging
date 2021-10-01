<?php
declare(strict_types=1);

namespace App\Client\Order\Persistence\Mapper;

use App\Client\Order\Persistence\Entity\Order;
use App\Generated\Dto\OrderDataTransferObject;

interface OrderMapperInterface
{
    /**
     * @param \App\Client\Order\Persistence\Entity\Order $order
     * @return \App\Generated\Dto\OrderDataTransferObject
     */
    public function map(Order $order): OrderDataTransferObject;
}