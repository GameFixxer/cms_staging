<?php
declare(strict_types=1);

namespace App\Frontend\Order\Communication;

use App\Component\View;
use App\Frontend\BackendController;
use App\Frontend\Order\Business\OrderManagerInterface;
use App\Generated\Dto\AddressDataTransferObject;
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
        $this->view->addTlpParam('order', 'Check Out');
        $this->view->addTemplate('order.tpl');
        $this->orderManager->setUser($this->userSession->getUser());

    }

    public function action()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['checkout']) && $this->requirementsFullFilled()) {
                if ($_POST['address'] === 'notNew') {
                    $this->addShoppingCardItems();
                    $this->addAddressToOrder($_POST['address']['type'], $_POST['address']['primary']);
                    $this->pushOrder();
                } elseif ($_POST['address'] === 'new') {
                    $this->createNewAddress();
                }
            }
        }
    }
    private function createNewAddress()
    {
        $newAddress = new AddressDataTransferObject();
        $newAddress->setUser($this->orderManager->getUser($this->userSession->getUser()));
        $newAddress->setType($_POST['address']['type']);
        $newAddress->setTown($_POST['address']['town']);
        $newAddress->setPostCode($_POST['address']['postcode']);
        $newAddress->setCountry($_POST['address']['country']);
        $newAddress->setStreet($_POST['address']['street']);
        $newAddress->setActive($_POST['address']['active']);
        $this->orderManager->createNewAddress($newAddress);
    }

    private function addShoppingCardItems()
    {
        $this->orderManager->addShoppingCardItems($this->userSession->getShoppingCard());
    }

    public function addAddressToOrder(string $type, bool $primary)
    {
        $this->orderManager->addAddressToOrder($type, $primary);
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
