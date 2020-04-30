<?php

namespace App\Controller\FrontendController;

use App\Controller\Controller;
use App\Service\View;
use App\Model\UserRepository;

class Login implements Controller
{
    public const ROUTE = 'backend';
    private View $view;
    private UserRepository $ur;
    private string $username;
    private string $password;

    public function __construct(View $view, object $ob1, object $ob2)
    {
        $this->view = $view;
        $this->ur = new UserRepository();
        $this->password = '';
        $this->username = '';
    }

    public function action(): void
    {
        $this->view->addTemplate('login.tpl');
    }

    private function authenticate(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty(trim($_POST['username'])) && !empty(trim($_POST['password']))) {
                $this->username = (string)trim($_POST['username']);
                $this->password = (string)trim($_POST['password']);

                if (!$this->username == '' || !$this->password == '') {
                    if (!$this->pr->authenticate($this->username, $this->password)) {
                        echo('Invalid username or password');
                    } else {
                        $this->view->addTemplate('backend.tpl');
                        $this->view->addTlpParam('productlist', $this->pr->getList());
                        //session_start();
                        $_SESSION['loggedin'] = true;
                        $_SESSION['username'] = $this->username;
                    }
                }
            } else {
                $this->view->addTemplate('login.tpl');
            }
        }
    }
}
