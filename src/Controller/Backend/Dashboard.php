<?php
namespace  App\Controller\Backend;

use App\Controller\BackendController;
use App\Controller\Backend\ProductController;
use App\Service\Container;
use App\Model\ProductRepository;
use App\Service\SessionUser;
use App\Service\View;

class Dashboard implements BackendController
{
    public const ROUTE = 'dashboard';
    private ProductRepository $productRepository;
    private View $view;
    private ProductController $productController;
    private SessionUser $usersession;

    public function __construct(Container $container)
    {
        $this->usersession= $container->get(SessionUser::class);
        $this->view = $container->get(View::class);
        $this->productRepository = $container->get(ProductRepository::class);
        $this->productController = $container->get(ProductController::class);
    }

    public function init(): void
    {
        if (!$this->usersession->isLoggedIn()) {
            $this->redirectToPage();
        } else {
            $this->action();
        }
    }
    public function action(): void
    {
        $this->view->addTlpParam('productlist', $this->productRepository->getProductList());
        $this->view->addTemplate('dashboard.tpl');
        if (!empty($_POST)) {
            if (!empty($_POST['logout'])) {
                $this->logout();
            } else {
                $this->productController->action();
            }
        }
    }
    private function logout(): void
    {
        session_unset();
        session_destroy();
        $this->redirectToPage();
    }
    private function redirectToPage():void
    {
        $host = $_SERVER['HTTP_HOST'];
        $uri = trim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra= 'Index.php?page='.Login::ROUTE;
        $extra2='&admin=true';
        header("Location: http://$host$uri/$extra$extra2");
        exit;
    }
}
