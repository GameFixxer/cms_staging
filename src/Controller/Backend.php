<?php

namespace App\Controller;


Use App\Model\ProductRepository;
Use App\Service\View;

class Backend implements Controller
{
    private ProductRepository $pr;
    private View $view;
    public const ROUTE = 'backend';
    private bool $loggedIn;

    public function __construct(View $view, ProductRepository $pr)
    {
        $this->loggedIn = false;
        $this->view = $view;
        $this->pr = $pr;
    }

    private function authentificate(): bool
    {
        $password = '';
        $username = '';

        if (!empty($_GET['username']) && !empty($_GET['password'])) {
            $username = (string)$_GET['username'];
            $password = (string)$_GET['password'];

            if (!$username == '' || !$password == '') {

                if (!$this->pr->authenticate($username, $password)) {
                    echo('Invalid username or password');
                    $this->loggedIn = false;

                } else {
                    $this->view->addTemplate('backend_.tpl');
                    $this->view->addTlpParam('', $this->pr->getList());
                    $this->loggedIn = true;

                }
            }
        } else {
            $this->view->addTemplate('login_.tpl');
        }

        return $this->loggedIn;
    }

    public function action()
    {


        if ($this->authentificate()) {
            $this->adminstrate();
        } else {
            $this->view->addTemplate('login_.tpl');
        }


    }

    private function adminstrate()
    {
        if (!empty($_POST)) {
            switch ($_POST) {
                case !empty($_POST['delete']):
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

            }
        }
    }

    private function deleteProduct(array $id): void
    {
        $this->pr->set('Delete from product where id= ?', 'i', $id);
    }

    private function createProduct(string $name, string $description): void
    {
        $tmp = array();
        $tmp[] = $name;
        $tmp[] = $description;
        $this->pr->set('INSERT INTO product (name, description) values(?,?)', 'ss', $tmp);
    }

    private function updateProduct(int $id, string $description): void
    {
        $tmp = array();
        $tmp[] = $description;
        $tmp[] = $id;
        $this->pr->set('Update product set description=(?) where id= ?', 'si', $tmp);
    }

    private function flushPage()
    {
        $this->view->addTlpParam('', $this->pr->getList());
        $flush = ($_GET);
    }
}