<?php

namespace App\Client\ShoppingCard\Persistence;

use App\Client\User\Persistence\Entity\User;
use App\Generated\Dto\ShoppingCardDataTransferObject;

interface ShoppingCardRepositoryInterface
{
    /**
     * @return ShoppingCardDataTransferObject[]
     */
    public function getShoppingCardList(): array;

    public function getShoppingCard(User $user): ?ShoppingCardDataTransferObject;
}