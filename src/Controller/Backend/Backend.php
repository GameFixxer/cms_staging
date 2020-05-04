<?php

declare(strict_types=1);

namespace App\Controller\Backend;

use App\Controller\BackendController;
use App\Model\ProductEntityManager;
use App\Model\ProductRepository;
use App\Service\View;
use App\Service\SessionUser;

class Backend implements BackendController
{
    public const ROUTE = 'backend';
    private ProductRepository $productRepository;
    private ProductEntityManager $productEntityManager;
    private View $view;


    public function __construct(View $view, ProductRepository $pr, ProductEntityManager $pem)
    {

        $this->productEntityManager = $pem;
        $this->view = $view;
        $this->productRepository = $pr;
    }

    public function action(): void
    {
        if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true) {
            $this->view->addTlpParam('productlist', $this->productRepository->getList());
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
        $this->productEntityManager->setToDB('Delete from product where id= ?', $id);
    }

    private function flushPage(): void
    {
        $this->view->addTlpParam('', $this->productRepository->getList());
    }

    private function updateProduct(int $id, string $description): void
    {
        $tmp = array();
        $tmp[] = $description;
        $tmp[] = $id;
        $this->productEntityManager->setToDB('Update product set description=(?) where id= ?', $tmp);
    }

    private function createProduct(string $name, string $description): void
    {
        $tmp = array();
        $tmp[] = $name;
        $tmp[] = $description;
        $this->productEntityManager->setToDB('INSERT INTO product (name, description) values(?,?)', $tmp);
    }

    private function logout(): void
    {
        session_unset();
        session_destroy();
        $this->view->addTemplate('login.tpl');
    }


}
