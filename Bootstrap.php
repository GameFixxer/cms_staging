<?php

use App\Component\ControllerProvider;
use App\Component\View;
use App\Frontend\Model\ErrorController;
use App\Component\SymfonyContainer;

$container = (new SymfonyContainer())->getContainer();


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
        $controller = $container->get($controller);
        $actionName = $action.'Action';
        //$controller = new $controller($container);
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
    $class = $container->get(ErrorController::class);
    $class->action();
}



/** @var View  $view */
$view = $container->get(View::class);

return $view;
