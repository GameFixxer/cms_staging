<?php

use App\Component\Container;
use App\Component\ControllerProvider;
use App\Component\DependencyProvider;
use App\Component\View;
use App\Frontend\Controller\Frontend\Model\ErrorController;


$container = new Container();
$containerProvider = new DependencyProvider();
$containerProvider->providerDependency($container);


$controller = new ControllerProvider();
$route = $_GET['cl'];
$action = $_GET ['page'] ?? '0';
$isAdmin = (!empty($_GET['admin']) && $_GET['admin'] === 'true');

if ($isAdmin) {
    $controllerList = $controller->getBackEndList();
} else {
    $controllerList = $controller->getFrontEndList();
}
$isFind = false;

foreach ($controllerList as $controller) {
    if (strtolower($controller::ROUTE) === $route) {
        $isFind = true;
        $controller = new $controller($container);
        $actionName = $action.'Action';
        $controller = new $controller($container);
        if ($isAdmin) {
            $controller->init();
        }
        if (method_exists($controller, $actionName)) {
            $controller->{$actionName}();
        } else {
            $controller->action();
        }
    }
}
if (!$isFind) {
    $class = new ErrorController($container);
    $class->action();
}



/** @var View  $view */
$view = $container->get(View::class);

return $view;
