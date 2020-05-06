<?php

namespace App\Controller\Backend;

use App\Controller\BackendController;
use App\Service\Container;
use App\Service\View;
use App\Model\UserRepository;
use App\Service\SessionUser;

class Login implements BackendController
{
    public const ROUTE = 'login';
    private View $view;
    private UserRepository $userRepository;
    private SessionUser $usersession;


    public function __construct(Container $container)
    {
        $this->usersession= $container->get(SessionUser::class);
        $this->view = $container->get(View::class);
        $this->userRepository = $container->get(UserRepository::class);
    }

    public function init(): void
    {
        if ($this->usersession->isLoggedIn()) {
            $this->redirectToDashboard();
        }
    }

    public function action(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty(trim($_POST['username'])) && !empty(trim($_POST['password']))) {
                $username = (string)trim($_POST['username']);
                $password = (string)trim($_POST['password']);
                if ($this->userRepository->hasUser($username, $password)) {
                    $this->usersession->setUser($username);
                    $_SESSION['loggedin'] = true;
                    $this->redirectToDashboard();

                }
                $this->view->addTlpParam('error', 'Invalid username or password.');
            }
        }
        $this->view->addTemplate('login.tpl');
    }

    private function redirectToDashboard():void
    {
        $host = $_SERVER['HTTP_HOST'];
        $uri = trim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra=  'Index.php?page='. Dashboard::ROUTE;
        $extra2='&admin=true';
        header("Location: http://$host$uri/$extra$extra2");
        exit;
    }
}
