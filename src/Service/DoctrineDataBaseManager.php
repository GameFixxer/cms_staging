<?php
declare(strict_types=1);

namespace App\Service;

use Doctrine\ORM\Tools\Setup;
use Doctrine\ORM\EntityManager;
use Spiral\Database;

class DoctrineDataBaseManager
{
    public static function getEntityManager()
    {
        debug_print_backtrace();
        $depth = dirname(__DIR__, 1);
        $paths =
            [
                $depth."/Client/Address/Persistence/Entity/",
                $depth."/Client/Attribute/Persistence/Entity/",
                $depth."/Client/Category/Persistence/Entity/",
                $depth."/Client/Order/Persistence/Entity/",
                $depth."/Client/Product/Persistence/Entity/",
                $depth."/Client/ShoppingCard/Persistence/Entity/",
                $depth."/Client/User/Persistence/Entity/"
            ];
        $isDevMode = false;

        // the connection configuration
        $dbParams = [
            'driver'   => 'pdo_mysql',
            'host' => '127.0.0.1',
            'user'     => 'root',
            'password' => 'pass123',
            'dbname'   => 'mvc',
            'port' => 3336
        ];
        $config = Setup::createAnnotationMetadataConfiguration($paths, $isDevMode);
        return EntityManager::create($dbParams, $config);
    }
}
