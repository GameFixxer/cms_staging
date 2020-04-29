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
    private string $username;
    private string $password;

    public function __construct(View $view, ProductRepository $pr)
    {
        $this->password = '';
        $this->username = '';

        $this->view = $view;
        $this->pr = $pr;
    }

    private function authentificate(): void
    {

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (!empty(trim($_POST['username'])) && !empty(trim($_POST['password']))) {
                $this->username = (string)trim($_POST['username']);
                $this->password = (string)trim($_POST['password']);

                if (!$this->username == '' || !$this->password == '') {

                    if (!$this->pr->authenticate($this->username, $this->password)) {
                        echo('Invalid username or password');

                    } else {
                        $this->view->addTemplate('backend_.tpl');
                        $this->view->addTlpParam('productlist', $this->pr->getList());
                        session_start();
                        $_SESSION["loggedin"] = true;
                        $_SESSION["username"] = $this->username;


                    }
                }
            } else {
                $this->view->addTemplate('login_.tpl');
            }
        }

    }

    public function action()
    {
        if (isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true) {
            $this->view->addTlpParam('productlist', $this->pr->getList());
            $this->view->addTemplate('backend_.tpl');
            $this->adminstrate();


        } else {
            $this->view->addTemplate('login_.tpl');
            $this->authentificate();
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
                case !empty($_POST['logout']):
                    break;
            }
        }
    }

    private function logout(): void
    {
        session_unset();
        session_destroy();
    }

    private function deleteProduct(array $id): void
    {
        $this->pr->setToDB('Delete from product where id= ?', $this->encodeArray($id), $id);
    }

    private
    function createProduct(
        string $name,
        string $description
    ): void {
        $tmp = array();
        $tmp[] = $name;
        $tmp[] = $description;
        $this->pr->setToDB('INSERT INTO product (name, description) values(?,?)', $this->encodeArray($tmp), $tmp);
    }

    private
    function updateProduct(
        int $id,
        string $description
    ): void {
        $tmp = array();
        $tmp[] = $description;
        $tmp[] = $id;
        $this->pr->setToDB('Update product set description=(?) where id= ?', $this->encodeArray($tmp), $tmp);
    }

    private
    function flushPage(): void
    {
        $this->view->addTlpParam('', $this->pr->getList());
        $flush = ($_GET);
    }

    private
    function encodeArray(
        array $params
    ): string {
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