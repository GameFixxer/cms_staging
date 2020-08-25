<?php
declare(strict_types=1);

namespace App\Client\Order\Persistence\Mapper;

use App\Client\Address\Business\AddressBusinessFacadeInterface;
use App\Client\Order\Persistence\Entity\Order;
use App\Client\ShoppingCard\Business\ShoppingCardBusinessFacadeInterface;
use App\Client\User\Business\UserBusinessFacade;
use App\Client\User\Business\UserBusinessFacadeInterface;
use App\Generated\AddressDataProvider;
use App\Generated\OrderDataProvider;
use App\Generated\UserDataProvider;

class OrderMapper implements OrderMapperInterface
{
    private ShoppingCardBusinessFacadeInterface $shoppingCardBusinessFacade;
    private UserBusinessFacadeInterface $userBusinessFacade;
    private AddressBusinessFacadeInterface $addressBusinessFacade;

    public function __construct(
        ShoppingCardBusinessFacadeInterface $shoppingCardBusinessFacade,
        UserBusinessFacadeInterface $userBusinessFacade,
        AddressBusinessFacadeInterface $addressBusinessFacade
    ) {
        $this->shoppingCardBusinessFacade = $shoppingCardBusinessFacade;
        $this->userBusinessFacade = $userBusinessFacade;
        $this->addressBusinessFacade = $addressBusinessFacade;
    }

    public function map(Order $order): OrderDataProvider
    {
        $orderDataTransferObject = new   OrderDataProvider();
        $orderDataTransferObject->setId($order->getId());
        $orderDataTransferObject->setStatus($order->getStatus());
        $user = $this->userBusinessFacade->getById($order->getUserId());
        if (! $user instanceof UserDataProvider) {
            throw new \Exception('Critical RepositoryError', 1);
        }
        $orderDataTransferObject->setUser($user);
        $orderDataTransferObject->setSum($order->getSum());
        $address = $this->addressBusinessFacade->get(
            $orderDataTransferObject->getUser(),
            $order->getAddressId()->getType(),
            $order->getAddressId()->getPostCode()
        );
        if (! $address instanceof AddressDataProvider) {
            throw new \Exception('Critical RepositoryError', 1);
        }
        $orderDataTransferObject->setAddress($address);

        $orderDataTransferObject->setDateOfOrder($order->getDateOfOrder());
        $orderDataTransferObject->setShoppingCard($this->shoppingCardBusinessFacade->get($order->getShoppingCardId()));

        return $orderDataTransferObject;
    }
}
