<?php
declare(strict_types=1);
namespace App\Client\Order\Persistence;

use App\Generated\Dto\OrderDataTransferObject;

interface OrderEntityManagerInterface
{
    public function delete(OrderDataTransferObject $order): void;

    public function save(OrderDataTransferObject $order): OrderDataTransferObject;
}