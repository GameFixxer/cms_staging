<?php
require_once('PageModell.php');
require_once('PageView.php');
require_once('PageControll.php');
require_once('PageTreeModell.php');
require_once('PageTreeView.php');
require_once('PageTreeControll.php');

$Pagetree = new PageTreeControll('root', 1);
$Pagetree->createNewPage(2, 'testseite');
$Pagetree->createNewPage(3, 'testseite2');