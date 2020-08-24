<?php
declare(strict_types=1);

namespace App\Client\Order\Persistence\Mapper;

use App\Client\Address\Business\AddressBusinessFacadeInterface;
use App\Client\Order\Persistence\Entity\Order;
use App\Client\ShoppingCard\Business\ShoppingCardBusinessFacadeInterface;
use App\Client\User\Business\UserBusinessFacade;
use App\Client\User\Business\UserBusinessFacadeInterface;
use App\Generated\OrderDataProvider;

class OrderMapper implements OrderMapperInterface
{
    private ShoppingCardBusinessFacadeInterface $shoppingCardBusinessFacade;
    private UserBusinessFacadeInterface $userBusinessFacade;
    private AddressBusinessFacadeInterface $addressBusinessFacade;

    public function __construct(
        ShoppingCardBusinessFacadeInterface $shoppingCardBusinessFacade,
        UserBusinessFacadeInterface $userBusinessFacade,
        AddressBusinessFacadeInterface $addressBusinessFacade
    )
    {
        $this->shoppingCardBusinessFacade = $shoppingCardBusinessFacade;
        $this->userBusinessFacade = $userBusinessFacade;
        $this->addressBusinessFacade = $addressBusinessFacade;
    }

    public function map(Order $order): OrderDataProvider
    {
        $orderDataTransferObject = new   OrderDataProvider();
        $orderDataTransferObject->setId($order->getOrderId());
        $orderDataTransferObject->setStatus($order->getStatus());
        $orderDataTransferObject->setUser($this->userBusinessFacade->getById($order->getUserId()));
        $orderDataTransferObject->setSum($order->getSum());
        $orderDataTransferObject->setAddress(
            $this->addressBusinessFacade->get(
                $orderDataTransferObject->getUser(),
                $order->getAddress()->getType(),
                $order->getAddress()->getPostCode()
            ));
        $orderDataTransferObject->setDateOfOrder($order->getDateOfOrder());
        $orderDataTransferObject->setShoppingCard($this->shoppingCardBusinessFacade->get($order->getShoppingCardId()));

        return $orderDataTransferObject;
    }
}
