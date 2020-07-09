<?php

declare(strict_types=1);

use App\Backend\ImportProduct\Business\Model\Importer;
use App\Component\Container;
use App\Component\DependencyProvider;


use Symfony\Component\Console\Application;

$application = new Application();

ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);

session_start();
$path = dirname(__DIR__, 1);
require_once($path.'/vendor/autoload.php');
define('C3_CODECOVERAGE_ERROR_LOG_FILE', $path.'/c3_error.log'); //Optional (if not set the default c3 output dir will be used)
include dirname(__DIR__, 1).'/c3.php';

$container = new Container();
$containerProvider = new DependencyProvider();
$containerProvider->providerDependency($container);

$import = $container->get(Importer::class);

$import->import();

