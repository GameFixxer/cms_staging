<?php
declare(strict_types=1);
namespace App\Frontend\Order\Business;

use App\Client\User\Persistence\Entity\User;
use App\Generated\AddressDataProvider;
use App\Generated\ShoppingCardDataProvider;
use App\Generated\UserDataProvider;

interface OrderManagerInterface
{
    public function addShoppingCardItems(ShoppingCardDataProvider $card): void;

    public function setUser(string $user) : void;

    public function addAddressToOrder(string $type, int $postcode): void;

    public function pushOrder(): void;

    public function getUser(string $username): UserDataProvider;

    public function createNewAddress(AddressDataProvider $newAddress):void;

    public function getAddressListFromUser():array;

    public function createShoppingCard(array $sessionCard):ShoppingCardDataProvider;

}