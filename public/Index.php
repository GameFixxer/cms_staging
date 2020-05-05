<?php

declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

use App\Controller\FrontendController\ErrorControll;
use App\Service\ControllerProvider;
use App\Service\View;
use App\Service\DependencyProvider;
use App\Service\Container;

session_start();

$path = dirname(__DIR__, 1);
require_once($path.'/vendor/autoload.php');
define('template_path', $path.'/templates');

$container = new Container();
$containerProvider = new DependencyProvider();
$containerProvider->providerDependency($container);


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

foreach ($controllerList as $controller) {
    if (strtolower($controller::ROUTE) === $page) {
        if (!$is_admin) {
            $isFind = true;
            $controller = new $controller($container);
            $controller->action();
            break;
        }
        if ($is_admin) {
            $isFind = true;
            $controller = new $controller($container);
            $controller->init();
        }
    }
}
if (!$isFind) {
    $class = new ErrorControll($container);
    $class->action();
}

$view =$container->get(View::class);
$view->display();
