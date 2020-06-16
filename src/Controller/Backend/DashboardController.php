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
    private String $userRole;

    public function __construct(Container $container)
    {
        $this->userSession = $container->get(SessionUser::class);
        $this->view = $container->get(View::class);
        $this->productRepository = $container->get(ProductRepository::class);
    }

    public function init(): void
    {
        if (!$this->userSession->isLoggedIn()) {
            $this->redirectToPage(LoginController::ROUTE);
        }
        $this->userRole = $this->userSession->getUserRole();
        switch ($this->userRole) {
        case $this->userRole === 'user':
            $this->view->addTlpParam('user', $this->userSession->getUser());
            $this->view->addTemplate('userDashboard.tpl');
            break;
        case $this->userRole === 'admin':
            $this->view->addTlpParam('user', $this->userSession->getUser());
            $this->view->addTemplate('adminDashboard.tpl');
            break;

        case $this->userRole === 'root':
            $this->view->addTlpParam('user', $this->userSession->getUser());
            $this->view->addTemplate('rootDashboard.tpl');
            break;

        }
    }
    public function action(): void
    {
    }

    private function redirectToPage(string $route):void
    {
        $host = $_SERVER['HTTP_HOST'];
        $uri = trim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra = 'Index.php?cl='.$route;
        $extra2 = '&admin=true';
        $extra3 = '&page=list';
        header("Location: http://$host$uri/$extra$extra2$extra3");
        exit;
    }
}
