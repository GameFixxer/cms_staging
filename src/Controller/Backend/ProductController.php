<?php

declare(strict_types=1);

namespace App\Controller\Backend;

use App\Controller\BackendController;
use App\Model\Dto\ProductDataTransferObject;
use App\Model\ProductEntityManager;
use App\Model\ProductRepository;
use App\Service\Container;
use App\Service\SessionUser;
use App\Service\View;

class ProductController implements BackendController
{
    public const ROUTE = 'product';
    private ProductRepository $productRepository;
    private ProductEntityManager $productEntityManager;
    private SessionUser $userSession;
    private View $view;

    public function __construct(Container $container)
    {
        $this->productRepository = $container->get(ProductRepository::class);
        $this->productEntityManager = $container->get(ProductEntityManager::class);
        $this->userSession = $container->get(SessionUser::class);
        $this->view = $container->get(View::class);
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
        $productDTO = $this->productRepository->getProductList();
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
        $productDTO = $this->productRepository->getProduct($_GET['id']);
        if ($this->checkForValidDTO($productDTO)) {
            $this->view->addTlpParam('product', $productDTO);
            $this->view->addTemplate('productEditPage.tpl');
        } else {
            $this->displayPageDoesNotExists();
        }
    }

    private function deleteProduct(string $articleNumber): void
    {
        $productDTO = $this->productRepository->getProduct($articleNumber);
        if ($productDTO instanceof ProductDataTransferObject) {
            $this->productEntityManager->delete($productDTO);
        }
    }

    private function saveProduct(string $articleNumber, string $description, string $name): void
    {
        $productDTO = $this->productRepository->getProduct($articleNumber);
        if (!$productDTO instanceof ProductDataTransferObject) {
            $productDTO = new ProductDataTransferObject();
            $productDTO->setArticleNumber($this->createArticleNumber());
        }
        $productDTO->setProductName($name);
        $productDTO->setProductDescription($description);
        $this->productEntityManager->save($productDTO);
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
    private function createArticleNumber():string
    {
        $list = $this->productRepository->getProductList();
        $idCounter = end($list)->getProductId() + 1;
        return (string)$idCounter;
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
