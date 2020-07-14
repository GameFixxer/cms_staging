<?php

declare(strict_types=1);

namespace App\Frontend\Product\Communication;

use App\Client\Product\Business\ProductBusinessFacade;
use App\Client\Product\Business\ProductBusinessFacadeInterface;
use App\Component\View;
use App\Frontend\BackendController;
use App\Frontend\Login\Communication\LoginController;
use App\Frontend\Product\Business\ProductManager;
use App\Frontend\Product\Business\ProductManagerInterface;
use App\Generated\Dto\ProductDataTransferObject;
use App\Service\SessionUser;

class ProductController implements BackendController
{
    public const ROUTE = 'product';
    private ProductBusinessFacadeInterface $productBusinessFacade;
    private SessionUser $userSession;
    private ProductManagerInterface $productManager;
    private View $view;

    public function __construct(
        ProductBusinessFacadeInterface $productBusinessFacade,
        SessionUser $userSession,
        ProductManagerInterface $productManager,
        View $view
    )
    {
        $this->productBusinessFacade = $productBusinessFacade;
        $this->userSession = $userSession;
        $this->view = $view;
        $this->productManager = $productManager;
    }

    public function init(): void
    {
        if (!$this->userSession->isLoggedIn()) {
            $this->view->setRedirect(LoginCOntroller::ROUTE, '&page=login', ['admin=true']);
        }
        if (($this->userSession->getUserRole() === 'user')) {
            $this->view->setRedirect(LoginCOntroller::ROUTE, '&page=logout', ['admin=true']);
        }
    }

    public function listAction()
    {
        $productDTO = $this->productBusinessFacade->getList();
        $this->view->addTlpParam('productlist', $productDTO);
        $this->view->addTemplate('productEditList.tpl');
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            switch ($_POST) {
            case isset($_POST['delete']):
                $this->deleteProduct((string)$_POST['delete']);
                break;
            case isset($_POST['save']):
                $this->saveProduct(
                    (string)$_POST['save'],
                    (string)$_POST['newpagedescription'],
                    (string)$_POST['newpagename']
                );
                break;
            }
            $this->view->setRedirect(self::ROUTE, '&page=list', ['admin=true']);
        }
    }

    public function detailAction(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            switch ($_POST) {
            case !empty($_POST['delete']):
                $this->deleteProduct((string)$_POST['delete']);
                break;
            case !empty($_POST['save']):

                $this->saveProduct(
                    (string)$_POST['save'],
                    (string)$_POST['newpagedescription'],
                    (string)$_POST['newpagename']
                );
                break;
            }
        }
        $productDTO = $this->productBusinessFacade->get($_GET['id']);
        if ($this->checkForValidDTO($productDTO)) {
            $this->view->addTlpParam('product', $productDTO);
            $this->view->addTemplate('productEditPage.tpl');
        } else {
            $this->displayPageDoesNotExists();
        }
    }

    private function deleteProduct(string $articleNumber): void
    {
        $productDTO = new ProductDataTransferObject();
        $productDTO->setArticleNumber($articleNumber);
        $this->productManager->delete($productDTO);
    }

    private function saveProduct(string $articleNumber, string $description, string $name): void
    {
        $productDTO = new ProductDataTransferObject();
        $productDTO->setArticleNumber($articleNumber);
        $productDTO->setName($name);
        $productDTO->setDescription($description);
        $this->productManager->save($productDTO);
    }

    private function checkForValidDTO($productDTO): bool
    {
        if (is_array($productDTO)) {
            return $this->checkArrayOfDTO($productDTO);
        } elseif ($productDTO === null) {
            return false;
        } else {
            return $productDTO instanceof ProductDataTransferObject;
        }
    }

    private function checkArrayOfDTO($productDTO): bool
    {
        foreach ($productDTO as $key) {
            if (!($key instanceof ProductDataTransferObject) || $key === null) {
                return false;
            }
        }
        return true;
    }

    private function displayPageDoesNotExists(): void
    {
        $this->view->addTlpParam('error', '404 Page not found.');
        $this->view->addTemplate('404.tpl');
    }
}
