<?php
declare(strict_types=1);
namespace App\Client\Order\Business;

use App\Generated\Dto\OrderDataTransferObject;

interface OrderBusinessFacadeInterface
{
    public function get(int $orderId): ?OrderDataTransferObject;

    /**
     * @return OrderDataTransferObject[]
     */
    public function getList(): array;

    public function save(OrderDataTransferObject $order): OrderDataTransferObject;

    public function delete(OrderDataTransferObject $order);
}