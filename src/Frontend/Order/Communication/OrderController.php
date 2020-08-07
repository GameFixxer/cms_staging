<?php
declare(strict_types=1);

namespace App\Frontend\Order\Communication;

use App\Client\Address\Business\AddressBusinessFacadeInterface;
use App\Client\Order\Business\OrderBusinessFacadeInterface;
use App\Client\Product\Business\ProductBusinessFacadeInterface;
use App\Client\User\Business\UserBusinessFacadeInterface;
use App\Component\View;
use App\Frontend\BackendController;
use App\Frontend\User\Communication\DashboardController;
use App\Generated\Dto\OrderDataTransferObject;
use App\Service\SessionUser;

class OrderController implements BackendController
{
    public const ROUTE = 'order';
    private SessionUser $userSession;
    private View $view;
    private UserBusinessFacadeInterface $userBusinessFacade;
    private OrderBusinessFacadeInterface $businessFacade;
    private OrderDataTransferObject $orderDataTransferObject;
    private AddressBusinessFacadeInterface $addressBusinessFacade;
    private ProductBusinessFacadeInterface $productBusinessFacade;

    public function __construct(
        View $view,
        UserBusinessFacadeInterface $userBusinessFacade,
        SessionUser $userSession,
        OrderBusinessFacadeInterface $businessFacade,
        AddressBusinessFacadeInterface $addressBusinessFacade,
        ProductBusinessFacadeInterface $productBusinessFacade
    ) {
        $this->userSession = $userSession;
        $this->view = $view;
        $this->userBusinessFacade = $userBusinessFacade;
        $this->businessFacade = $businessFacade;
        $this->addressBusinessFacade = $addressBusinessFacade;
        $this->productBusinessFacade = $productBusinessFacade;
    }

    public function init(): void
    {
        if ($this->userSession->isLoggedIn() && !($_GET['page'] === 'logout')) {
            $this->view->setRedirect(self::ROUTE, '&page=list', ['admin=true']);
            $this->orderDataTransferObject->setUser($this->userBusinessFacade->get($this->userSession->getUser()));
        }
        $this->view->addTlpParam('login', 'LOGIN AREA');
    }

    public function action()
    {
    }

    private function addShoppingCardItems()
    {
        $card = $this->userSession->getShoppingCard();
        $sum = 0;
        foreach ($card as $item) {
            $sum = $sum + $this->productBusinessFacade->get($item)->getPrice();
        }
        $this->orderDataTransferObject->setSum($sum);
        $this->orderDataTransferObject->setOrderedProducts(implode(',', $card));
    }

    private function addAddressToOrder(string $type, bool $primary)
    {
        $this->orderDataTransferObject->setAddress(
            $this->addressBusinessFacade->get($this->orderDataTransferObject->getUser(), $type, $primary)
        );
    }

    private function pushOrder()
    {
        $this->businessFacade->save($this->orderDataTransferObject);
    }
}
