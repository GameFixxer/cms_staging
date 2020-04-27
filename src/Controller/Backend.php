<?php

namespace App\Controller;

use App\Controller\Controller;
Use App\Model\ProductRepository;
Use App\Service\View;
use Exception;

class Backend implements Controller
{
    private ProductRepository $pr;
    private View $view;
    public const ROUTE = 'backend';

    public function __construct(View $view, ProductRepository $pr)
    {
        $this->view = $view;
        $this->pr = $pr;
    }

    private function authentificate(): bool
    {
        $test = false;
        $password = '';
        $username = '';
        try {
            $username = (string)$_POST['username'];
            $password = (string)$_POST['password'];
            if (!$username == '' || !$password == '') {

                if (!$this->pr->authenticate($username, $password)) {
                    echo('Invalid username or password');
                    false;

                } else {
                    $this->view->addTemplate('backend_.tpl');
                    $this->view->addTlpParam('', $this->pr->getList());
                    $test = true;

                }
            }

        } catch (Exception $e) {
            //echo('no valid input for username or password');
            return false;
        }

        return $test;
    }

    public function action()
    {
        $this->view->addTemplate('staging.tpl');
        if (!$this->authentificate()) {
            echo('If you are not the admin. Please switch page.');
        } else {
            $this->adminstrate();
        }
    }

    private function adminstrate()
    {
        //while($_GET['page']==='backend') {
        $delete = (string)$_POST['delete'];
        var_dump($delete);
        //}
    }

    private function deleteProduct():void
    {
        $this->pr->setProdcut('Delete from product where id=?', 's', $_POST['delete']);
    }

    private function createProduct():void
    {
        $this->pr->setProdcut();
    }

    private function updateProduct():void
    {
        $this->pr->setProdcut();
    }
}