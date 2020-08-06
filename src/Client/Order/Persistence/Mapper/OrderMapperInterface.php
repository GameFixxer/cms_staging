<?php
declare(strict_types=1);

namespace App\Client\Order\Persistence\Mapper;

use App\Client\Order\Persistence\Entity\Order;
use App\Generated\Dto\OrderDataTransferObject;

interface OrderMapperInterface
{
    public function map(Order $order): OrderDataTransferObject;
}