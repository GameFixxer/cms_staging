<?php
declare(strict_types=1);

namespace App\Frontend\Order\Business;

use App\Client\Address\Business\AddressBusinessFacadeInterface;
use App\Client\Order\Business\OrderBusinessFacadeInterface;
use App\Client\Product\Business\ProductBusinessFacadeInterface;
use App\Client\ShoppingCard\Business\ShoppingCardBusinessFacadeInterface;
use App\Client\User\Business\UserBusinessFacadeInterface;
use App\Client\User\Persistence\Entity\User;
use App\Generated\AddressDataProvider;
use App\Generated\OrderDataProvider;
use App\Generated\ShoppingCardDataProvider;
use App\Generated\UserDataProvider;
use App\Service\SessionUser;

class OrderManager implements OrderManagerInterface
{
    private OrderDataProvider $orderDataTransferObject;
    private UserBusinessFacadeInterface $userBusinessFacade;
    private ProductBusinessFacadeInterface $productBusinessFacade;
    private AddressBusinessFacadeInterface $addressBusinessFacade;
    private OrderBusinessFacadeInterface $businessFacade;
    private ShoppingCardBusinessFacadeInterface $shoppingCardBusinessFacade;
    private SessionUser $sessionUser;

    public function __construct(
        UserBusinessFacadeInterface $userBusinessFacade,
        OrderBusinessFacadeInterface $businessFacade,
        AddressBusinessFacadeInterface $addressBusinessFacade,
        ProductBusinessFacadeInterface $productBusinessFacade,
        ShoppingCardBusinessFacadeInterface $shoppingCardBusinessFacade,
        SessionUser $sessionUser
    ) {
        $this->userBusinessFacade = $userBusinessFacade;
        $this->businessFacade = $businessFacade;
        $this->addressBusinessFacade = $addressBusinessFacade;
        $this->productBusinessFacade = $productBusinessFacade;
        $this->orderDataTransferObject = new OrderDataProvider();
        $this->shoppingCardBusinessFacade = $shoppingCardBusinessFacade;
        $this->sessionUser = $sessionUser;
    }

    public function getAddressListFromUser(): array
    {
        return $this->addressBusinessFacade->getListFromSpecificUser($this->orderDataTransferObject->getUser()->getId());
    }

    public function getUser(string $username): UserDataProvider
    {
        $user = $this->userBusinessFacade->get($this->sessionUser->getUser());
        if (! $user instanceof UserDataProvider) {
            throw new \Exception('Fatal UserRepository error', 1);
        }
        return $user;
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

    public function setUser(string $username): void
    {
        $user = $this->userBusinessFacade->get($username);
        if (! $user instanceof UserDataProvider) {
            throw new \Exception('Fatal UserRepository error', 1);
        }
        $this->orderDataTransferObject->setUser($user);
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
    public function createShoppingCard(array $sessionCard):ShoppingCardDataProvider
    {
        $user = $this->userBusinessFacade->get($this->sessionUser->getUser());
        if (! $user instanceof UserDataProvider) {
            throw new \Exception('Fatal UserRepository error', 1);
        }
        $shoppingcard = $this->shoppingCardBusinessFacade->get(
            $user->getId()
        );

        return $shoppingcard;
    }
}
