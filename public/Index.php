<?php
declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);


use App\Model\ProductRepository;
use App\Controller\ListControll;
use App\Controller\HomeControll;
use App\Controller\DetailControll;
use App\Controller\ErrorControll;
use App\Service\ControllerProvider;
use App\Service\View;
use App\Service\SQLConnector;


$path = dirname(__DIR__, 1);
require_once($path . '/vendor/autoload.php');
define('template_path', $path . '/templates');

$connect = new SQLConnector();
$connect->connect();

$dm = new ProductRepository($connect);
$view = new View();
$controller = new ControllerProvider();
$page = $_GET ['page'];

$controllerList = $controller->getList();
$isFind = false;

foreach ($controllerList as $controller) {

    if (strtolower($controller::ROUTE) === $page) {
        $isFind = true;
        $controllerClass = new $controller($view, $dm);
        $controllerClass->action();
        break;
    }
}
if (!$isFind) {
    $class = new ErrorControll($view);
    $class->action();
}

$view->display();
