<?php

use App\Controller\ListControll;
use App\Controller\HomeControll;
use App\Controller\PageControll;

require_once(__DIR__ . '/vendor/autoload.php');
define('template_path', __DIR__ . '/template');

$smarty = new \Smarty();

$smarty->setTemplateDir('/web/www.example.com/smarty/templates');
$smarty->setCompileDir('/web/www.example.com/smarty/templates_c');
$smarty->setCacheDir('/web/www.example.com/smarty/cache');
$smarty->setConfigDir('/web/www.example.com/smarty/configs');

$smarty->assign('name', 'Ned');
$smarty->display('index.tpl');

switch ($_GET) {
    case$_GET['page'] === 'list':
    {
        $list = (new ListControll())->action();
        break;
    }
    case$_GET['page'] === 'home':
    {
        $home = (new HomeControll())->action();
        break;
    }
    case$_GET['page'] === 'detail':
    {
        $page = (new PageControll())->action();
        break;
    }

}

