<?php


namespace App\Tests\integration\Model;

use App\Model\Dto\ProductDataTransferObject;
use App\Model\ProductEntityManager;
use App\Service\Container;
use App\Service\DependencyProvider;

/**
 * @group ProductEntityManagerTest
 */
class ProductEntityManagerTest extends \Codeception\Test\Unit
{
    public function testFu()
    {
        $container = new Container();
        $containerProvider = new DependencyProvider();
        $containerProvider->providerDependency($container);
        /** @var ProductEntityManager $productEntityManager */
        $productEntityManager = $container->get(ProductEntityManager::class);
        $productDTO = new ProductDataTransferObject();
        $productDTO->setProductName('foo');
        $productDTO->setProductDescription('fuuuu');
        $productEntityManager->save($productDTO);
    }
}
