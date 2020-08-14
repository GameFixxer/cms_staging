<?php

namespace App\Frontend\Login\Business;

use App\Generated\ShoppingCardDataProvider;

interface LoginManagerInterface
{
    public function createShoppingCard(array $sessionCard): ShoppingCardDataProvider;

    public function extractSessionShoppingCard(ShoppingCardDataProvider $cardData): array;
}