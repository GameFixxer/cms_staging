<?php
declare(strict_types=1);

namespace App\Client\Order\Persistence;

use App\Generated\Dto\OrderDataTransferObject;

interface OrderRepositoryInterface
{
    /**
     * @return OrderDataTransferObject[]
     */
    public function getOrderList(): array;

    public function getOrder(int $orderId): ?OrderDataTransferObject;
}