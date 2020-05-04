<?php

declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

use App\Controller\FrontendController\ErrorControll;
use App\Model\ProductEntityManager;
use App\Model\ProductRepository;
use App\Service\ControllerProvider;
use App\Service\View;
use App\Service\SQLConnector;
use App\Service\ContainerProvider;

session_start();
$path = dirname(__DIR__, 1);
require_once($path.'/vendor/autoload.php');
define('template_path', $path.'/templates');

$connect = new SQLConnector();
$productrepository = new ProductRepository($connect);
$productentitymanager = new ProductEntityManager($connect);
$view = new View();
$controller = new ControllerProvider();
$page = $_GET ['page'];
$is_admin = false;

if (!empty($_GET['admin']) && $_GET['admin'] === 'true') {
    $controllerList = $controller->getBackEndList();
    $is_admin = true;
} else {
    $controllerList = $controller->getFrontEndList();
}
$isFind = false;

$containerProvider = new ContainerProvider();


foreach ($controllerList as $controller) {
    if (strtolower($controller::ROUTE) === $page) {
        if (!$is_admin) {
            $isFind = true;
            $controller = new $controller($containerProvider->get($controller));
            $controller->action();
            break;
        }
        if ($is_admin) {
            $isFind = true;
            $controller = new $controller($view, $productrepository, $productentitymanager);
            $controller->init();
        }
    }
}
if (!$isFind) {
    $class = new ErrorControll($view, $productrepository);
    $class->action();
}

$view->display();
