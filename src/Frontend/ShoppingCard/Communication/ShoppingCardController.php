<?php

declare(strict_types=1);

namespace App\Frontend\ShoppingCard\Communication;

use App\Client\ShoppingCard\Business\ShoppingCardBusinessFacadeInterface;
use App\Client\User\Business\UserBusinessFacade;
use App\Component\View;
use App\Frontend\BackendController;
use App\Frontend\Login\Communication\LoginController;
use App\Frontend\ShoppingCard\Business\ShoppingCardManagerInterface;
use App\Service\SessionUser;

class ShoppingCardController implements BackendController
{
    public const ROUTE = 'shoppingCard';

    private ShoppingCardBusinessFacadeInterface $shoppingCardBusinessFacade;
    private SessionUser $sessionUser;
    private ShoppingCardManagerInterface $shoppingCardManager;
    private UserBusinessFacade $businessFacade;
    private View $view;


    public function __construct(
        ShoppingCardBusinessFacadeInterface $shoppingCardBusinessFacade,
        SessionUser $sessionUser,
        ShoppingCardManagerInterface $shoppingCardManager,
        UserBusinessFacade $businessFacade,
        View $view
    ) {
        $this->shoppingCardBusinessFacade = $shoppingCardBusinessFacade;
        $this->sessionUser = $sessionUser;
        $this->shoppingCardManager = $shoppingCardManager;
        $this->businessFacade = $businessFacade;
        $this->view = $view;
    }

    public function init(): void
    {
        if (!$this->sessionUser->isLoggedIn()) {
            $this->view->setRedirect(LoginCOntroller::ROUTE, '&page=login', ['admin=true']);
        }
        $this->view->setRedirect(LoginCOntroller::ROUTE, '&page=shoppingCard', ['admin=true']);
    }

    public function shoppingCardAction()
    {
        $shoppingCardDTO = $this->shoppingCardBusinessFacade->get($this->shoppingCardManager->getUser($this->sessionUser->getUser()));
        $this->view->addTlpParam('shoppingCard', $shoppingCardDTO);
        $this->view->addTemplate('shoppingCard.tpl');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            switch ($_POST) {
                case isset($_POST['delete']):
                   $this->remove((string)$_POST['remove']);
                    break;
                case isset($_POST['save']):
                    $this->add((string)$_POST['add']);
                    break;
                case isset($_POST['checkout']):
                    $this->checkout();
                    break;
            }
            $this->view->setRedirect(self::ROUTE, '&page=list', ['admin=true']);
        }
    }
    private function remove(string $articleNumber)
    {
    }
    private function add(string $articleNumber)
    {
    }
    private function checkout()
    {
    }
}
