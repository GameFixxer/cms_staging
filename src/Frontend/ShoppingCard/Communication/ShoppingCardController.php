<?php

declare(strict_types=1);

namespace App\Frontend\ShoppingCard\Communication;

use App\Client\ShoppingCard\Business\ShoppingCardBusinessFacadeInterface;
use App\Client\ShoppingCard\Persistence\ShoppingCardEntityManagerInterface;
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
    private View $view;


    public function __construct(
        ShoppingCardBusinessFacadeInterface $shoppingCardBusinessFacade,
        SessionUser $sessionUser,
        ShoppingCardManagerInterface $shoppingCardManager,
        View $view
    ) {
        $this->shoppingCardBusinessFacade = $shoppingCardBusinessFacade;
        $this->sessionUser = $sessionUser;
        $this->shoppingCardManager = $shoppingCardManager;
        $this->view = $view;
    }

    public function init(): void
    {
        if (!$this->sessionUser->isLoggedIn()) {
            $this->view->setRedirect(LoginCOntroller::ROUTE, '&page=login', ['admin=true']);
        }
        if (($this->sessionUser->getUserRole() === 'user')) {
            $this->view->setRedirect(LoginCOntroller::ROUTE, '&page=shoppingCard', ['admin=true']);
        }
    }

    public function shoppingCardAction()
    {
    }
}
