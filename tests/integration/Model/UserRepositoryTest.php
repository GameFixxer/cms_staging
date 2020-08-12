<?php


namespace App\Tests\integration\Model;

use App\Client\Product\Persistence\Entity\Product;
use App\Client\Product\Persistence\Entity\TestEntity;
use App\Client\User\Persistence\Entity\User;
use App\Client\User\Persistence\Mapper\UserMapper;
use App\Client\User\Persistence\UserRepository;
use App\Service\DatabaseManager;
use App\Service\PasswordManager;
use App\Tests\integration\Helper\ContainerHelper;
use Cycle\ORM\ORM;
use Cycle\ORM\Transaction;

class UserRepositoryTest extends \Codeception\Test\Unit
{
    private ContainerHelper $container;
    private Transaction $transaction;
    private \Cycle\ORM\RepositoryInterface $ormUserRepository;
    private PasswordManager $passwordManager;
    private User $entity;

    public function _before()
    {
        $this->container = new ContainerHelper();

        $databaseManager = new DatabaseManager();

        $this->passwordManager = new PasswordManager();

        $orm = $databaseManager->connect();

        $this->ormUserRepository = $orm->getRepository(User::class);

        $this->transaction = new Transaction($orm);
        $this->transaction->persist($this->createProductEntity());
        $this->transaction->run();
    }

    public function _after()
    {
        if ($this->ormUserRepository->findByPK($this->entity->getId()) instanceof User) {
            $this->transaction->delete($this->ormUserRepository->findByPK($this->entity->getId()));
            $this->transaction->run();
        }
    }

    public function testGetUserWithExistingUser()
    {
        $userRepository = $this->container->getUserRepository();

        $userDtoFromRepository = $userRepository->get($this->entity->getUsername());
        $this->assertSame($this->entity->getUsername(), $userDtoFromRepository->getUsername());
        $this->assertSame($this->entity->getPassword(), $userDtoFromRepository->getUserPassword());
        $this->assertSame($this->entity->getId(), $userDtoFromRepository->getUserId());
    }

    public function testGetUserWithNonExistingUser()
    {
        $productRepository = $this->container->getProductRepository();

        $this->assertNull($productRepository->getProduct(0));
    }

    public function testGetLastUserOfUserListWithNonEmptyDatabase()
    {
        $userRepository = $this->container->getUserRepository();

        $userListFromUserRepository = $userRepository->getList();

        $lastUserOfUserList = end($userListFromUserRepository);

        $this->assertSame($this->entity->getUsername(), $lastUserOfUserList ->getUsername());
        $this->assertSame($this->entity->getPassword(), $lastUserOfUserList->getUserPassword());
        $this->assertSame($this->entity->getId(), $lastUserOfUserList ->getUserId());
    }

    private function createProductEntity() :User
    {
        $this->entity = new User();
        $this->entity->setUsername('mate');
        $this->entity->setPassword('seeyou');
        $this->entity->setRole('user');
        $this->entity->setSessionId('');
        $this->entity->setResetPassword('');
        $this->entity->setShoppingCard("");

        return $this->entity;
    }
}
