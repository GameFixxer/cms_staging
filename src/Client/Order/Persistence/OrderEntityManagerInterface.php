<?php
declare(strict_types=1);
namespace App\Client\Order\Persistence;

use App\Generated\OrderDataProvider;

interface OrderEntityManagerInterface
{
    public function delete(OrderDataProvider $order): void;

    public function save(OrderDataProvider $order): OrderDataProvider;
}