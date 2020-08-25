<?php
declare(strict_types=1);

namespace App\Service;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;

class DoctrineDataBaseManager
{
    public static function getEntityManager()
    {
        $paths = array(dirname(__DIR__, 1)."Client/*/Persistence/Entity/");
        $isDevMode = false;

        // the connection configuration
        $dbParams = array(
            'driver'   => 'pdo_mysql',
            'user'     => 'root',
            'password' => 'pass123',
            'dbname'   => 'mvc',
        );
        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
        return EntityManager::create($dbParams, $config);
    }
}
