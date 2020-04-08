<?php
require_once('PageModell.php');
require_once('PageView.php');
require_once('PageControll.php');
require_once('PageTreeModell.php');
require_once('PageTreeView.php');
require_once('PageTreeControll.php');
require_once('Page404.php');

$pagetree = new PageTreeControll('Listenseite', 1);
$pagetree->createNewPage(2, 'testseite');
$pagetree->createNewPage(3, 'testseite2');
switch ($_GET) {
    case$_GET:
    {

        $pagetree->action();

    }

}

