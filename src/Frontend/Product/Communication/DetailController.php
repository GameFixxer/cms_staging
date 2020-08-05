<?php
declare(strict_types=1);

namespace App\Frontend\Product\Communication;

use App\Client\Product\Business\ProductBusinessFacade;
use App\Client\Product\Business\ProductBusinessFacadeInterface;
use App\Component\View;
use App\Frontend\Controller;
use App\Frontend\Product\Business\ProductManagerInterface;
use App\Generated\Dto\ProductDataTransferObject;
use App\Service\SessionUser;

class DetailController implements Controller
{
    public const ROUTE = 'detail';
    private ProductBusinessFacadeInterface $productBusinessFacade;
    private SessionUser $userSession;
    private ProductManagerInterface $productManager;
    private View $view;

    public function __construct(
        ProductBusinessFacadeInterface $productBusinessFacade,
        SessionUser $userSession,
        ProductManagerInterface $productManager,
        View $view
    ) {
        $this->productBusinessFacade = $productBusinessFacade;
        $this->userSession = $userSession;
        $this->view = $view;
        $this->productManager = $productManager;
    }


    public function action(): void
    {
        $articleNumber = ($_GET['id'] ?? '0');

        $productDTO = $this->productBusinessFacade->get($articleNumber);
        if (!$productDTO instanceof ProductDataTransferObject) {
            $this->view->addTlpParam('error', '404 Page not found.');
            $this->view->addTemplate('404.tpl');
        } else {
            $this->view->addTemplate('detail.tpl');
            $this->view->addTlpParam('page', $productDTO);
            if (isset($_POST['add'])) {
                $this->addToShoppingCard((string)$_POST['add']);
            }
        }
    }

    private function addToShoppingCard(string $articleNumber)
    {
        $this->userSession->addToShoppingCard($articleNumber);
    }
}
