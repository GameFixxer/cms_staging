<?php
declare(strict_types=1);

namespace App\Client\ShoppingCard\Persistence\Mapper;

use App\Client\ShoppingCard\Persistence\Entity\ShoppingCard;
use App\Generated\Dto\ShoppingCardDataTransferObject;

class ShoppingCardMapper implements ShoppingCardMapperInterface
{
    public function map(ShoppingCard $shoppingCard): ShoppingCardDataTransferObject
    {
        $ShoppingCardDTO = new ShoppingCardDataTransferObject();
        $ShoppingCardDTO->setId($shoppingCard->getId());
        $ShoppingCardDTO->setUser($shoppingCard->getUser());
        $ShoppingCardDTO->setProduct($shoppingCard->getProduct());
        $ShoppingCardDTO->setAmount($shoppingCard->getAmount());
        $ShoppingCardDTO->setSum($shoppingCard->getSum());

        return $ShoppingCardDTO;
    }
}
