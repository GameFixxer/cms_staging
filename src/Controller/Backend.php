<?php
declare(strict_types=1);

namespace App\Controller;


Use App\Model\ProductRepository;
Use App\Service\View;
use phpDocumentor\Reflection\DocBlock\Tags\Return_;

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

    private function adminstrate(): void
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
        $this->pr->set('Delete from product where id= ?', $this->encodeArray($id), $id);
    }

    private function createProduct(string $name, string $description): void
    {
        $tmp = array();
        $tmp[] = $name;
        $tmp[] = $description;
        $this->pr->set('INSERT INTO product (name, description) values(?,?)', $this->encodeArray($tmp), $tmp);
    }

    private function updateProduct(int $id, string $description): void
    {
        $tmp = array();
        $tmp[] = $description;
        $tmp[] = $id;
        $this->pr->set('Update product set description=(?) where id= ?', $this->encodeArray($tmp), $tmp);
    }

    private function flushPage(): void
    {
        $this->view->addTlpParam('', $this->pr->getList());
        $flush = ($_GET);
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
}