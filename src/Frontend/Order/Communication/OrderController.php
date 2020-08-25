<?php
declare(strict_types=1);

namespace App\Frontend\Order\Communication;

use App\Component\View;
use App\Frontend\BackendController;
use App\Frontend\Order\Business\OrderManagerInterface;
use App\Frontend\ShoppingCard\Business\ShoppingCardManagerInterface;
use App\Generated\AddressDataProvider;
use App\Service\SessionUser;

class OrderController implements BackendController
{
    public const ROUTE = 'order';
    private SessionUser $userSession;
    private View $view;
    private OrderManagerInterface $orderManager;


    public function __construct(
        View $view,
        SessionUser $userSession,
        OrderManagerInterface $orderManager
    ) {
        $this->userSession = $userSession;
        $this->view = $view;
        $this->orderManager = $orderManager;
    }

    public function init(): void
    {
        if (!$this->userSession->isLoggedIn()) {
            $this->view->addTlpParam('login', 'LOGIN AREA');
            $this->view->setRedirect('login', '&page=list', ['admin=true']);
        }
        $this->orderManager->setUser($this->userSession->getUser());
    }

    public function action()
    {
        $this->view->addTlpParam('order', $this->orderManager->getAddressListFromUser());
        $this->view->addTemplate('order.tpl');
        
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['checkout']) && $this->requirementsFullFilled()) {
                if ($_POST['address'] === 'notNew') {
                    $this->addShoppingCardItems();
                    $this->addAddressToOrder($_POST['address']['type'], $_POST['address']['postcode']);
                    $this->pushOrder();
                } elseif ($_POST['address'] === 'new') {
                    $this->createNewAddress();
                }
            }
        }
    }

    public function paymentAction()
    {
        $this->view->addTlpParam('order', $this->orderManager->getAddressListFromUser());
        $this->view->addTemplate('payment.tpl');
    }


    private function createNewAddress()
    {
        $newAddress = new AddressDataProvider();
        $newAddress->setUser($this->orderManager->getUser($this->userSession->getUser()));
        $newAddress->setFirstName($_POST['address']['firstname']);
        $newAddress->setLastName($_POST['address']['lastname']);
        $newAddress->setType($_POST['address']['type']);
        $newAddress->setTown($_POST['address']['town']);
        $newAddress->setPostCode($_POST['address']['postcode']);
        $newAddress->setCountry($_POST['address']['country']);
        $newAddress->setStreet($_POST['address']['street']);
        $this->orderManager->createNewAddress($newAddress);
    }

    private function addShoppingCardItems()
    {
        $this->orderManager->addShoppingCardItems($this->orderManager->createShoppingCard($this->userSession->getShoppingCard()));
    }

    public function addAddressToOrder(string $type, int $postcode)
    {
        $this->orderManager->addAddressToOrder($type, $postcode);
    }

    private function pushOrder()
    {
        $this->orderManager->pushOrder();
    }

    private function requirementsFullFilled():bool
    {
        return isset($_POST['address'])&& isset($_POST['payment']);
    }
}
