<?php
declare(strict_types=1);
namespace  App\Controller\Backend;

use App\Controller\BackendController;
use App\Service\Container;
use App\Model\ProductRepository;
use App\Service\SessionUser;
use App\Service\View;

class DashboardController implements BackendController
{
    public const ROUTE = 'dashboard';
    private ProductRepository $productRepository;
    private View $view;
    private SessionUser $userSession;

    public function __construct(Container $container)
    {
        $this->userSession= $container->get(SessionUser::class);
        $this->view = $container->get(View::class);
        $this->productRepository = $container->get(ProductRepository::class);
    }

    public function init(): void
    {
        if (!$this->userSession->isLoggedIn()) {
            $this->redirectToPage(LoginController::ROUTE);
        }
    }
    public function action(): void
    {
    }

    private function redirectToPage(string $route):void
    {
        $host = $_SERVER['HTTP_HOST'];
        $uri = trim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra= 'Index.php?cl='.$route;
        $extra2='&admin=true';
        $extra3='&page=list';
        header("Location: http://$host$uri/$extra$extra2$extra3");
        exit;
    }
}
