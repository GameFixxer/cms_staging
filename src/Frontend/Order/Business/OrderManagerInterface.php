<?php
declare(strict_types=1);
namespace App\Frontend\Order\Business;

use App\Client\User\Persistence\Entity\User;
use App\Generated\AddressDataProvider;
use App\Generated\ShoppingCardDataProvider;

interface OrderManagerInterface
{
    public function addShoppingCardItems(ShoppingCardDataProvider $card): void;

    public function setUser(string $user) : void;

    public function addAddressToOrder(string $type, bool $primary): void;

    public function pushOrder(): void;

    public function getUser(string $username): User;

    public function createNewAddress(AddressDataProvider $newAddress):void;

    public function getAddressListFromUser():array;

}