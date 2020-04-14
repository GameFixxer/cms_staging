<?php

require_once('vendor/autoload.php');

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

