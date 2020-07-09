<?php

declare(strict_types=1);

namespace App\Frontend\Product\Communication;

use App\Client\Product\Business\ProductBusinessFacade;
use App\Client\Product\Business\ProductBusinessFacadeInterface;
use App\Component\Container;
use App\Component\View;
use App\Frontend\BackendController;
use App\Frontend\Controller\Backend\Login\Model\LoginController;
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

    public function __construct(Container $container)
    {
        $this->productBusinessFacade = $container->get(ProductBusinessFacade::class);
        $this->userSession = $container->get(SessionUser::class);
        $this->view = $container->get(View::class);
        $this->productManager = $container->get(ProductManager::class);
    }

    public function init(): void
    {
        if (!$this->userSession->isLoggedIn()) {
            $this->redirectToPage(LoginCOntroller::ROUTE, '&page=login');
        }
        if (($this->userSession->getUserRole() === 'user')) {
            $this->redirectToPage(LoginCOntroller::ROUTE, '&page=logout');
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
            $this->redirectToPage(self::ROUTE, '&page=list');
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
        $productDTO->setProductName($name);
        $productDTO->setProductDescription($description);
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

    private function redirectToPage(string $route, string $page): void
    {
        //$host =$_SERVER['HTTP_HOST'];
        $uri = trim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'Index.php?cl='.$route;
        $extra2 = $page;
        $extra3 = '&admin=true';
        //header("Location: http://$host$uri/$extra$extra2$extra3");
        header("Location:http://localhost:8080$uri/$extra$extra2$extra3");
    }
}
