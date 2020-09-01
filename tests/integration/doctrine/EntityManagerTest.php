<?php


namespace App\Tests\integration\doctrine;

use App\Client\Attribute\Persistence\Entity\Attribute;
use App\Service\DoctrineDataBaseManager;
use App\Tests\integration\Helper\Product2;

/**
 * @group doctrine
 */

class EntityManagerTest extends \Codeception\Test\Unit
{
    private $repository;
    public function _before()
    {
        $entity = DoctrineDataBaseManager::getEntityManager();
        $this->repository = $entity->getRepository('Product2');
    }

    public function testGetRepository()
    {
        $cache = $this->repository->findAll();
        self::assertNotNull($cache);
    }
}
