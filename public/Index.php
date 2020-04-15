<?php

use App\Controller\ListControll;
use App\Controller\HomeControll;
use App\Controller\PageControll;
use App\Service\View;

require_once(dirname(__DIR__, 1) . '/vendor/autoload.php');
define('template_path', dirname(__DIR__, 1) . '/templates');

 $view = new View();

switch ($_GET) {
    case$_GET['page'] === 'list':
    {
        $list = new ListControll($view);
        $list->action();
        break;
    }
    case$_GET['page'] === 'home':
    {
        $home = new HomeControll($view);
        $home->action();
        break;
    }
    case$_GET['page'] === 'detail':
    {
        $page = new PageControll($view);
        $page->action();
        break;
    }

}

