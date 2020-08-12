<?php
declare(strict_types=1);
namespace App\Client\Order\Business;

use App\Generated\OrderDataProvider;

interface OrderBusinessFacadeInterface
{
    public function get(int $orderId): ?OrderDataProvider;

    /**
     * @return OrderDataProvider[]
     */
    public function getList(): array;

    public function save(OrderDataProvider $order): OrderDataProvider;

    public function delete(OrderDataProvider $order);
}