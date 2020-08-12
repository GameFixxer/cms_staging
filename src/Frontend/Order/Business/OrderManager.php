<?php
declare(strict_types=1);

namespace App\Frontend\Order\Business;

use App\Client\Address\Business\AddressBusinessFacadeInterface;
use App\Client\Order\Business\OrderBusinessFacadeInterface;
use App\Client\Product\Business\ProductBusinessFacadeInterface;
use App\Client\User\Business\UserBusinessFacadeInterface;
use App\Client\User\Persistence\Entity\User;
use App\Generated\AddressDataProvider;
use App\Generated\OrderDataProvider;
use App\Generated\ShoppingCardDataProvider;

class OrderManager implements OrderManagerInterface
{
    private OrderDataProvider $orderDataTransferObject;
    private UserBusinessFacadeInterface $userBusinessFacade;
    private ProductBusinessFacadeInterface $productBusinessFacade;
    private AddressBusinessFacadeInterface $addressBusinessFacade;
    private OrderBusinessFacadeInterface $businessFacade;

    public function __construct(
        UserBusinessFacadeInterface $userBusinessFacade,
        OrderBusinessFacadeInterface $businessFacade,
        AddressBusinessFacadeInterface $addressBusinessFacade,
        ProductBusinessFacadeInterface $productBusinessFacade
    )
    {
        $this->userBusinessFacade = $userBusinessFacade;
        $this->businessFacade = $businessFacade;
        $this->addressBusinessFacade = $addressBusinessFacade;
        $this->productBusinessFacade = $productBusinessFacade;
        $this->orderDataTransferObject = new OrderDataProvider();
    }

    public function getAddressListFromUser(): array
    {
        return $this->addressBusinessFacade->getListFromSpecificUser($this->orderDataTransferObject->getUser()->getId());
    }

    public function getUser(string $username): User
    {
        $userDTO = $this->userBusinessFacade->get($username);
        $userEntity = new User();
        $userEntity->setAddress($userDTO->getShoppingCard());
        $userEntity->setUsername($userDTO->getUsername());
        $userEntity->setResetPassword($userDTO->getResetPassword());
        $userEntity->setSessionId($userDTO->getSessionId());
        $userEntity->setShoppingCard($userDTO->getShoppingCard());
        $userEntity->setRole($userDTO->getRole());
        $userEntity->setPassword($userDTO->getPassword());
        return $userEntity;
    }

    public function addShoppingCardItems(ShoppingCardDataProvider $card): void
    {
        $sum = 0;
        foreach ($card as $item) {
            $sum = $sum + $this->productBusinessFacade->get($item)->getPrice();
        }
        $this->orderDataTransferObject->setSum($sum);
        $this->orderDataTransferObject->addShoppingCard($card);
    }

    public function setUser(string $user): void
    {
        $this->orderDataTransferObject->setUser($this->userBusinessFacade->get($user));
    }

    public function addAddressToOrder(string $type, bool $primary): void
    {
        $this->orderDataTransferObject->setAddress(
            $this->addressBusinessFacade->get($this->orderDataTransferObject->getUser(), $type, $primary)
        );
    }

    public function pushOrder(): void
    {
        $this->businessFacade->save($this->orderDataTransferObject);
    }

    public function createNewAddress(AddressDataProvider $newAddress): void
    {
        $this->addressBusinessFacade->save($newAddress);
    }
}
