<?php

declare(strict_types=1);

namespace App\Controller\BackendController;

use App\Controller\BackEndController;
use App\Model\ProductRepository;
use App\Service\View;

class Backend implements BackEndController
{
    public const ROUTE = 'backend';
    private ProductRepository $pr;
    private View $view;
    private string $username;
    private string $password;

    public function __construct(View $view, ProductRepository $pr)
    {
        $this->password = '';
        $this->username = '';

        $this->view = $view;
        $this->pr = $pr;
    }

    public function action(): void
    {
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            $this->view->addTlpParam('productlist', $this->pr->getList());
            $this->view->addTemplate('backend.tpl');
            $this->administrate();
        } else {
            $this->view->addTemplate('login.tpl');
            $this->authenticate();
        }
    }

    public function init(): void
    {
    }

    private function administrate(): void
    {
        if (!empty($_POST)) {
            switch ($_POST) {
                case !empty($_POST['delete']):
                    $tmp = [];
                    $tmp [] = (int)$_POST['delete'];
                    $this->deleteProduct($tmp);
                    $this->flushPage();
                    break;
                case !empty($_POST['update']):
                    $tmp = (int)$_POST['update'];
                    $input = (string)$_POST['updatedescription'];
                    $this->updateProduct($tmp, $input);
                    $this->flushPage();
                    break;
                case !empty($_POST['new']):
                    $tmp = (string)$_POST['newpname'];
                    $input = (string)$_POST['newpdescription'];
                    $this->createProduct($tmp, $input);
                    $this->flushPage();
                    break;
                case !empty($_POST['logout']):
                    $this->logout();
                    break;
            }
        }
    }

    private function deleteProduct(array $id): void
    {
        $this->pr->setToDB('Delete from product where id= ?', $this->encodeArray($id), $id);
    }

    private function encodeArray(array $params): string
    {
        $tmp = '';
        foreach ($params as $key) {
            switch ($key) {
                case is_int(gettype($key)):
                    $tmp .= 'i';
                    break;
                case is_string(gettype($key)):
                    $tmp .= 's';
                    break;
                case is_float(gettype($key)):
                    $tmp .= 'd';
                    break;
            }
        }

        return $tmp;
    }

    private function flushPage(): void
    {
        $this->view->addTlpParam('', $this->pr->getList());
    }

    private function updateProduct(int $id, string $description): void
    {
        $tmp = array();
        $tmp[] = $description;
        $tmp[] = $id;
        $this->pr->setToDB('Update product set description=(?) where id= ?', $this->encodeArray($tmp), $tmp);
    }

    private function createProduct(string $name, string $description): void
    {
        $tmp = array();
        $tmp[] = $name;
        $tmp[] = $description;
        $this->pr->setToDB('INSERT INTO product (name, description) values(?,?)', $this->encodeArray($tmp), $tmp);
    }

    private function logout(): void
    {
        session_unset();
        session_destroy();
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
