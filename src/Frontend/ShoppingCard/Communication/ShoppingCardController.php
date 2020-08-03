<?php


namespace App\Frontend\ShoppingCard\Communication;

use App\Component\View;
use App\Frontend\BackendController;
use App\Frontend\ShoppingCard\Business\ShoppingCardManagerInterface;
use App\Generated\Dto\ProductDataTransferObject;
use App\Service\SessionUser;

class ShoppingCardController implements BackendController
{
    public const ROUTE = 'card';
    private SessionUser $sessionUser;
    private View $view;
    private ShoppingCardManagerInterface $shoppingCardManager;

    public function __construct(
        SessionUser $sessionUser,
        View $view,
        ShoppingCardManagerInterface $shoppingCardManager
    ) {
        $this->sessionUser = $sessionUser;
        $this->view = $view;
        $this->shoppingCardManager = $shoppingCardManager;
    }

    public function init(): void
    {
        // TODO: Implement init() method.
    }

    public function action()
    {
        $tmp  =$this->makeListFromCard();
        $this->view->addTlpParam('productlist', $tmp);
        $this->view->addTemplate('ShoppingCard.tpl');
    }

    private function makeListFromCard():array
    {
        return $this->shoppingCardManager->getShoppingCard($this->sessionUser->getShoppingCard());
    }
}
