<?php
require_once('PageModell.php');
require_once('PageView.php');
require_once('PageControll.php');
require_once('PageTreeModell.php');
require_once('PageTreeView.php');
require_once('PageTreeControll.php');
require_once ('Page404.php');

$pagetree = new PageTreeControll('Listenseite', 1);
$pagetree->createNewPage(2, 'testseite');
$pagetree->createNewPage(3, 'testseite2');
switch ($_GET) {
    case$_GET:
    {

        $pagetree->action();

    }
    /*
    case$_GET['page'] === 'detail':
       $pagetree->action();
        /*
         * Auslagern in Controller
         *
         *
         * */


/*
    {
        switch ($_GET) {
            case$_GET['page']=== 'detail' && $pagetree->isPageValid($_GET['id']) === false:{
                echo('Es tut mir leid, allerdings exisitiert die von dir angegebene Seite nicht!');
                break;
            }
            case$_GET['page'] === 'detail' && $pagetree->isPageValid($_GET['id'])=== true:
            {

                echo('Du hast folgende Detailseite gewählt:'."<br/>");
                $pagetree->pingPage($_GET['id']);
                break;
            }
            case$_GET['page'] === 'detail' && $_GET['id'] === '':
            {

                echo('Du musst die ID einer Seite angeben!');
                break;
            }
        }
    }*/
}

