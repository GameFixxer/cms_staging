<?php

declare(strict_types=1);
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
$path = dirname(__DIR__, 1);
require_once($path.'/vendor/autoload.php');
define('C3_CODECOVERAGE_ERROR_LOG_FILE', $path.'/c3_error.log'); //Optional (if not set the default c3 output dir will be used)
include dirname(__DIR__, 1).'/c3.php';

define('MY_APP_STARTED', true);

define('template_path', $path.'/templates/dist');

$view = require __DIR__.'/../Bootstrap.php';
if(!empty($view->getRedirect())){
    $view->redirect();
}
$view->display();
