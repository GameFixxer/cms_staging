<?php

use App\Controller\ListControll;
use App\Controller\HomeControll;
use App\Controller\DetailControll;
use App\Controller\ErrorControll;
use App\Service\ControllerProvider;

use App\Service\View;

$path = dirname(__DIR__, 1);
require_once($path . '/vendor/autoload.php');
define('template_path', $path . '/templates');

$view = new View();
$controller = new ControllerProvider();
$request = ucfirst($_GET ['page']);

$included = $controller->inArrayMultidimension($request, 'code');
if ($included === true) {
    $class = $controller->getKeyInMultiArray($request, 'code');
    $objectinstance = new $class($view);
    $objectinstance->action();
} else {
    $class = new ErrorControll($view);
}



