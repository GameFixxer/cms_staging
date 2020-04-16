<?php

use App\Controller\ListControll;
use App\Controller\HomeControll;
use App\Controller\DetailControll;
use App\Controller\ErrorControll;
use App\Model\InternClassModel;
use App\Service\View;

$path = dirname(__DIR__, 1);
require_once($path . '/vendor/autoload.php');
define('template_path', $path . '/templates');

$view = new View();
$controller = new InternClassModel();
$request = ucfirst($_GET ['page']);

$included = in_array($request, $controller->createListOfController(), true);
switch ($_GET) {
    case in_array($request, $controller->createListOfController(), true) === true:
    {
        $class =$request.'Controll';
        $objectinstance = new $class($view);
    }
    case in_array($request, $controller->createListOfController(), true) === false:
    {
        $class = new ErrorControll($view);
    }


}

