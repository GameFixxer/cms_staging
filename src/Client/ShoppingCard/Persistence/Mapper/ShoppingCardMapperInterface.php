<?php
declare(strict_types=1);
namespace App\Client\ShoppingCard\Persistence\Mapper;

use App\Client\ShoppingCard\Persistence\Entity\ShoppingCard;
use App\Generated\Dto\ShoppingCardDataTransferObject;

interface ShoppingCardMapperInterface
{
    public function map(ShoppingCard $shoppingCard): ShoppingCardDataTransferObject;
}