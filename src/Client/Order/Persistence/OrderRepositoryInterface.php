<?php
declare(strict_types=1);

namespace App\Client\Order\Persistence;

use App\Generated\OrderDataProvider;

interface OrderRepositoryInterface
{
    /**
     * @return OrderDataProvider[]
     */
    public function getList(): array;

    public function get(int $orderId): ?OrderDataProvider;

    public function getWithDateAndUserId(int $userId, string $dateOfOrder): ?OrderDataProvider;
}