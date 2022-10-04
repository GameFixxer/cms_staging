<?php
declare(strict_types=1);

namespace App\Service;

use Spiral\Database;
use Spiral\Database\Config\DatabaseConfig;
use Cycle\ORM;
use Cycle\Annotated;
use Cycle\Schema as CycleSchema;
use Symfony\Component\Finder\Finder;
use \Spiral\Tokenizer\ClassLocator;

class DatabaseManager
{
    /**
     * @return \Cycle\ORM\ORMInterface
     */
    public static function connect()
    {
        $dbal = new Database\DatabaseManager(
            new DatabaseConfig([
                'default' => 'default',
                'databases' => [
                    'default' => [
                        'connection' => 'mysql',
                    ],
                ],
                'connections' => [
                    'mysql' => [
                        'driver' => Database\Driver\MySQL\MySQLDriver::class,
                        'options' => [
                            'connection' => 'mysql:host=127.0.01:3336;dbname=mvc',
                            'username' => 'root',
                            'password' => 'pass123',
                        ],
                    ],
                ],
            ])
        );

        $finder = (new Finder())->files()->in([dirname(__DIR__, 2) . '/src/Client/*/Persistence/Entity/']); // __DIR__ here is folder with entities
        $classLocator = new ClassLocator($finder);

        $schema = (new CycleSchema\Compiler())->compile(new CycleSchema\Registry($dbal), [
            new CycleSchema\Generator\ResetTables(), // re-declared table schemas (remove columns)
            new Annotated\Embeddings($classLocator), // register embeddable entities
            new Annotated\Entities($classLocator), // register annotated entities
            new Annotated\MergeColumns(), // add @Table column declarations
            new CycleSchema\Generator\GenerateRelations(), // generate entity relations
            new CycleSchema\Generator\ValidateEntities(), // make sure all entity schemas are correct
            new CycleSchema\Generator\RenderTables(), // declare table schemas
            new CycleSchema\Generator\RenderRelations(), // declare relation keys and indexes
            new Annotated\MergeIndexes(), // add @Table column declarations
            new CycleSchema\Generator\SyncTables(), // sync table changes to database
            new CycleSchema\Generator\GenerateTypecast(), // typecast non string columns
        ]);

        $orm = new ORM\ORM(new ORM\Factory($dbal));

        return $orm->withSchema(new ORM\Schema($schema));
    }
}
