<?php

use App\controller\ListControll;
use App\controller\HomeControll;
use App\controller\PageControll;

require_once(dirname(__DIR__, 1) . '/vendor/autoload.php');
define('template_path', dirname(__DIR__, 1) . '/templates');


$smarty = new Smarty();

$smarty->setTemplateDir(dirname(__DIR__, 1) . '/templates');
$smarty->setCompileDir(dirname(__DIR__, 1) . '/templates_c');
$smarty->setCacheDir(dirname(__DIR__, 1) . '/cache');
$smarty->setConfigDir(dirname(__DIR__, 1) . '/configs');
$smarty->assign('name', 'Renégade');
/*
try {
    $smarty->display('index.tpl');
} catch (SmartyException $e) {
} catch (Exception $e) {
}*/

switch ($_GET) {
    case$_GET['page'] === 'list':
    {
        $list = new ListControll($smarty);
        $list->action();
        break;
    }
    case$_GET['page'] === 'home':
    {
        $home = new HomeControll($smarty);
        $home->action();
        break;
    }
    case$_GET['page'] === 'detail':
    {
        $page = new PageControll($smarty);
        $page->action();
        break;
    }

}

