<?php
declare(strict_types=1);

namespace App\Client\Order\Persistence\Mapper;

use App\Client\Order\Persistence\Entity\Order;
use App\Generated\OrderDataProvider;

interface OrderMapperInterface
{
    public function map(Order $order): OrderDataProvider;
}