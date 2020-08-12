<?php
declare(strict_types=1);

namespace App\Client\Order\Persistence;

use App\Generated\OrderDataProvider;

interface OrderRepositoryInterface
{
    /**
     * @return OrderDataProvider[]
     */
    public function getOrderList(): array;

    public function getOrder(int $orderId): ?OrderDataProvider;
}