<?php
declare(strict_types=1);
namespace App\Client\Order\Persistence;

use App\Generated\Dto\OrderDataTransferObject;

interface OrderEntityManagerInterface
{
    /**
     * @param \App\Generated\Dto\OrderDataTransferObject $order
     */
    public function delete(OrderDataTransferObject $order): void;

    /**
     * @param \App\Generated\Dto\OrderDataTransferObject $order
     * @return \App\Generated\Dto\OrderDataTransferObject
     */
    public function save(OrderDataTransferObject $order): OrderDataTransferObject;
}