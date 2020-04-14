<?php


require_once(__DIR__ . '/vendor/autoload.php');
define('template_path', __DIR__ . '/template');
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

