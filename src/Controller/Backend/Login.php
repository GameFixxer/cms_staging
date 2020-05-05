<?php

namespace App\Controller\Backend;

use App\Controller\BackendController;
use App\Controller\Controller;
use App\Service\Container;
use App\Service\SQLConnector;
use App\Service\View;
use App\Model\UserRepository;
use App\Service\SessionUser;
use App\Controller\Backend\Backend;

class Login implements BackendController
{
    public const ROUTE = 'login';
    private View $view;
    private UserRepository $ur;
    private string $username;
    private string $password;
    private SessionUser $usersession;


    public function __construct(Container $container)
    {
        $this->usersession= $container->get(SessionUser::class);
        $this->view = $container->get(View::class);
        $this->ur = $container->get(UserRepository::class);
        $this->password = '';
        $this->username = '';
    }

    public function action(): void
    {
        $this->view->addTemplate('login.tpl');
    }
    public function init(): void
    {
        if ($this->usersession->isLoggedIn()) {
            $this->redirectToBackend();
        } else {
            $this->view->addTemplate('login.tpl');
            $this->authenticate();
        }
    }

    private function authenticate(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty(trim($_POST['username'])) && !empty(trim($_POST['password']))) {
                $this->username = (string)trim($_POST['username']);
                $this->password = (string)trim($_POST['password']);

                if (!$this->username == '' || !$this->password == '') {
                    if (!$this->ur->hasUser($this->username, $this->password)) {
                        echo('Invalid username or password');
                    } else {
                        $this->redirectToBackend();
                    }
                }
            } else {
                $this->action();
            }
        }
    }
    private function redirectToBackend():void
    {
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $this->username;
        $host = $_SERVER['HTTP_HOST'];
        $uri = trim(dirname($_SERVER['PHP_SELF']), '/\\');
        $extra=  'Index.php?page='. Backend::ROUTE;
        $extra2='&admin=true';
        header("Location: http://$host$uri/$extra$extra2");
        exit;
    }
}
