<?php
declare(strict_types=1);
namespace App\Service;

use Spiral\Database;
use Cycle\ORM;
use Cycle\Annotated;
use Cycle\Schema as CycleSchema;

class DatabaseManager
{

    public static function connect()
    {

        $dbal = new Database\DatabaseManager(
            new \Spiral\Database\Config\DatabaseConfig([
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

        $finder = (new \Symfony\Component\Finder\Finder())->files()->in([dirname(__DIR__, 2).'/src/Client/*/Persistence/Entity/']); // __DIR__ here is folder with entities
        $classLocator = new \Spiral\Tokenizer\ClassLocator($finder);

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
        return  $orm->withSchema(new ORM\Schema($schema));

    }
}
