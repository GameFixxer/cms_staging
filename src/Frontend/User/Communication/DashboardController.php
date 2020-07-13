<?php
declare(strict_types=1);

namespace App\Frontend\User\Communication;

use App\Component\Container;
use App\Component\View;

use App\Frontend\BackendController;
use App\Frontend\Login\Communication\LoginController;
use App\Service\SessionUser;

class DashboardController implements BackendController
{
    public const ROUTE = 'dashboard';
    private View $view;
    private SessionUser $userSession;

    public function __construct(Container $container)
    {
        $this->userSession = $container->get(SessionUser::class);
        $this->view = $container->get(View::class);
    }

    public function init(): void
    {
        if (!$this->userSession->isLoggedIn()) {
            $this->view->setRedirect(LoginController::ROUTE, '&page=list', ['admin=true']);
        }

    }
    public function action(): void
    {
        $userRole = $this->userSession->getUserRole();
        switch ($userRole) {
        case $userRole === 'user':
            $this->view->addTemplate('userDashboard.tpl');
            break;
        case $userRole === 'admin':
            $this->view->addTemplate('adminDashboard.tpl');
            break;

        case $userRole === 'root':

            $this->view->addTemplate('rootDashboard.tpl');
            break;

        }
        $this->view->addTlpParam('user', $this->userSession->getUser());
    }
}
