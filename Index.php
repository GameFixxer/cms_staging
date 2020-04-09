<?php

require_once('Modell/DatenModell.php');
require_once('Controller/Controller.php');
require_once('Controller/PageControll.php');
require_once('Controller/ListControll.php');
require_once('Controller/HomeControll.php');
require_once('Controller/ErrorControll.php');

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

