<?php


namespace App\Tests\integration\Component;

use App\Client\Product\Persistence\ProductRepository;
use App\Component\SymfonyContainer;

/**
 * @group container
 */

class DiyContainerTest extends \Codeception\Test\Unit
{
    public function testGetMapperFromContainer()
    {
        $container = new SymfonyContainer();
        $container = $container->getContainer();
        $repository = $container->get(ProductRepository::class);
        self::assertNotNull($repository);
    }
}
