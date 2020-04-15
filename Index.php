<?php

use App\controller\ListControll;
use App\controller\HomeControll;
use App\controller\PageControll;

require_once(__DIR__ . '/vendor/autoload.php');
define('template_path', __DIR__ . '/template');


$smarty = new \Smarty();

$smarty->setTemplateDir('/home/rene/smarty/templates');
$smarty->setCompileDir('/home/rene/smarty/templates_c');
$smarty->setCacheDir('/home/rene/smarty/cache');
$smarty->setConfigDir('/home/rene//smarty/configs');

$smarty->assign('name', 'Renégade');
try {
    $smarty->display('index.tpl');
} catch (SmartyException $e) {
}

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

