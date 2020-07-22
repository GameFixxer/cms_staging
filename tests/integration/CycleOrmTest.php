<?php
namespace App\Tests\integration;

use App\Client\Attribute\Persistence\Entity\Attribute;

use App\Tests\integration\Helper\ContainerHelper;
use App\Client\Product\Persistence\Entity\Product;
use Cycle\ORM\Transaction;
use Spiral\Database;
use Cycle\ORM;
use Cycle\Annotated;
use Cycle\Schema as CycleSchema;

/**
 * @group cycle
 */

class CycleOrmTest extends \Codeception\Test\Unit
{
    private \Cycle\ORM\RepositoryInterface $ormProductRepository;
    private \Cycle\ORM\RepositoryInterface $ormAttributeRepository;
    private ContainerHelper $container;
    private Product $product;
    private $orm;

    public function _before()
    {
        $this->container = new ContainerHelper();
        $this->orm = $this->container->getOrmProductRepository();
        $this->ormProductRepository = $this->orm->getRepository(Product::class);
        $this->ormAttributeRepository = $this->orm->getRepository(Attribute::class);
        $this->createProduct();
        $transaction = new Transaction($this->orm);
        $transaction->persist($this->product);
        $transaction->run();
    }

    public function _after()
    {
    }

    public function testGetAttributeInProduct()
    {
        $productEntity = $this->ormProductRepository->findOne(['article_Number'=>$this->product->getArticleNumber()]);
        self::assertNotNull($productEntity);
        self::assertSame($productEntity->getProductName(), $this->product->getProductName());
        self::assertSame($productEntity->getProductDescription(), $this->product->getProductDescription());
        self::assertSame($productEntity->getAttribute(), $this->product->getAttribute());
    }

    public function testORMFunctionality()
    {
        $this->createProduct();
        $transaction =new Transaction($this->orm);
        codecept_debug($transaction->persist($this->product));
    }

    public function testORM(){
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

        codecept_debug($schema = (new CycleSchema\Compiler())->compile(new CycleSchema\Registry($dbal), [
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
        ]));


        $orm = new ORM\ORM(new ORM\Factory($dbal));
        return  $orm->withSchema(new ORM\Schema($schema));
    }


    private function createProduct()
    {
        $tmp = rand(1, 1000).substr('', rand(1, 1000));
        $this->createProductEntity(''.$tmp);
    }

    private function createProductEntity(string $articleNumber)
    {
        $attribute = new Attribute();
        $attribute->setAttributeKey('tester');
        $attribute->setAttributeValue('attributtest');
        $transaction = new Transaction($this->orm);
        $transaction->persist($attribute);
        $transaction->run();
        $this->product = new Product();
        $this->product->setArticleNumber($articleNumber);
        $this->product->setAttribute($attribute);
        $this->product->setProductName('productname');
        $this->product->setProductDescription('productdescription');
    }
}
