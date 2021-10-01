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

    /**
     * @param int $orderId
     * @return \App\Generated\Dto\OrderDataTransferObject|null
     */
    public function getAddress(int $orderId): ?OrderDataTransferObject;
}