<?php
declare(strict_types=1);

namespace App\Frontend\Product\Communication;

use App\Client\Product\Business\ProductBusinessFacadeInterface;
use App\Component\View;
use App\Frontend\Controller;
use App\Frontend\Product\Business\ProductManagerInterface;
use App\Generated\ProductDataProvider;
use App\Service\SessionUser;

class ListController implements Controller
{
    public const ROUTE = 'list';
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
        $productDTO = $this->productBusinessFacade->getList();
        if (!$this->checkForValidDTO($productDTO)) {
            $this->view->addTlpParam('error', '404 Page not found.');
            $this->view->addTemplate('404.tpl');
        }
        $this->view->addTemplate('index.tpl');
        $this->view->addTlpParam('productlist', $productDTO);
        if (isset($_POST['add'])) {
            $this->addToShoppingCard((string)$_POST['add']);
        }

    }

    private function checkForValidDTO($productDTO) :bool
    {
        if (is_array($productDTO)) {
            foreach ($productDTO as $key) {
                if (!($key instanceof ProductDataProvider)) {
                    return false;
                }
            }
            return true;
        }
        return $productDTO instanceof ProductDataProvider;
    }

    private function addToShoppingCard(string $articleNumber)
    {
        $this->userSession->addToShoppingCard($articleNumber);
    }
}
