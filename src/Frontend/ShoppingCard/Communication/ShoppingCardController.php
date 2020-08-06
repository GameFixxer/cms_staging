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

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            switch ($_POST) {
            case isset($_POST['add']):
                $this->addToShoppingCard((string)$_POST['add']);
                break;

            case isset($_POST['remove']):
                $this->removeFromShoppingCard((string)$_POST['remove']);
                break;
            }
        }
        $tmp = $this->makeListFromCard();
        $this->view->addTlpParam('productlist', $tmp);
        $this->view->addTemplate('ShoppingCard.tpl');
    }

    private function addToShoppingCard(string $articleNumber)
    {
        $this->sessionUser->addToShoppingCard($articleNumber);
    }

    private function removeFromShoppingCard(string $articleNumber)
    {
        $this->sessionUser->removeFromShoppingCard($articleNumber);
    }

    private function makeListFromCard():array
    {
        return $this->shoppingCardManager->getShoppingCard((array)$this->sessionUser->getShoppingCard());
    }
}
