<?php


namespace App\Frontend\Login\Business;

use App\Client\ShoppingCard\Business\ShoppingCardBusinessFacadeInterface;
use App\Client\User\Business\UserBusinessFacadeInterface;
use App\Generated\ShoppingCardDataProvider;
use App\Service\SessionUser;

class LoginManager implements LoginManagerInterface
{
    private SessionUser $sessionUser;
    private ShoppingCardBusinessFacadeInterface $shoppingCardBusinessFacade;
    private UserBusinessFacadeInterface $userBusinessFacade;

    public function __construct(
        SessionUser $sessionUser,
        ShoppingCardBusinessFacadeInterface $shoppingCardBusinessFacade,
        UserBusinessFacadeInterface $userBusinessFacade
    ) {
        $this->sessionUser = $sessionUser;
        $this->shoppingCardBusinessFacade = $shoppingCardBusinessFacade;
        $this->userBusinessFacade = $userBusinessFacade;
    }

    public function createShoppingCard(array $sessionCard):ShoppingCardDataProvider
    {
        $shoppingcard = $this->shoppingCardBusinessFacade->get(
            $this->userBusinessFacade->get(
                $this->sessionUser->getUser()
            )->getId()
        );

        return $shoppingcard;
    }

    public function extractSessionShoppingCard(ShoppingCardDataProvider $cardData):array
    {
        $shoppingCard = [];
        foreach ($cardData->getProduct() as $productDataProvider) {
            $shoppingCard[] = $productDataProvider->getName();
        }
        return $shoppingCard;
    }
}
