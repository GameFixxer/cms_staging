<?php
declare(strict_types=1);

use Doctrine\ORM\Tools\Console\ConsoleRunner;
use App\Service\DoctrineDataBaseManager;

// replace with file to your own project bootstrap
require_once __DIR__.'/Bootstrap.php';

// replace with mechanism to retrieve EntityManager in your app
$doctrineDataBaseManager = new DoctrineDataBaseManager();
$entityManager = $doctrineDataBaseManager->getEntityManager();

return ConsoleRunner::createHelperSet($entityManager);
