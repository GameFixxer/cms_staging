<?php


namespace App\Tests\integration\Model;

use App\Client\User\Persistence\UserEntityManager;
use App\Client\User\Persistence\Entity\User;
use App\Generated\UserDataProvider;
use App\Service\DatabaseManager;
use App\Tests\integration\Helper\ContainerHelper;
use Cycle\ORM\Transaction;

/**
 * @group Repository
 */


class UserEntityManagerTest extends \Codeception\Test\Unit
{
    private UserDataProvider $userDto;
    private ContainerHelper $container;
    private UserEntityManager $userEntityManager;

    public function _before()
    {
        $this->container = new ContainerHelper();
        $this->userEntityManager = $this->container->getUserEntityManager();
        $this->createDto('fu', 'ba', 'user');
    }

    public function _after()
    {
        $orm = new DatabaseManager();
        $orm = $orm->connect();
        $ormUserRepository = $orm->getRepository(User::class);
        $transaction = new Transaction($orm);
        $transaction->delete($ormUserRepository->findByPK($this->userDto->getId()));
        $transaction->run();
    }

    public function testCreateUser()
    {
        $this->userDto = $this->userEntityManager->save($this->userDto);
        $userFromRepository = $this->container->getUserRepository()->get($this->userDto->getUsername());

        $this->assertSame($this->userDto->getUsername(), $userFromRepository->getUsername());
        $this->assertSame($this->userDto->getPassword(), $userFromRepository->getPassword());
        $this->assertSame($this->userDto->getId(), $userFromRepository->getId());

    }

    public function testUpdateUser()
    {
        $this->testCreateUser();

        $this->userDto->setUsername('fabulous');
        $this->userDto->setPassword('even more fabulous');

        $this->userDto = $this->userEntityManager->save($this->userDto);

        $userFromRepository = $this->container->getUserRepository()->get($this->userDto->getUsername());
        dump($userFromRepository);
        die();
        $this->assertSame($this->userDto->getUsername(), $userFromRepository->getUsername());
        $this->assertSame($this->userDto->getPassword(), $userFromRepository->getPassword());
        $this->assertSame($this->userDto->getId(), $userFromRepository->getId());
    }

    public function testDeleteUser()
    {
        $this->testCreateUser();

        $this->userEntityManager->delete($this->userDto);

        $this->assertNull($this->container->getUserRepository()->get($this->userDto->getUsername()));
        $this->userDto = $this->testCreateUser();
    }

    private function createDto(String $username, String $password, String $role)
    {
        $this->userDto = new UserDataProvider();
        $this->userDto->setUsername($username);
        $this->userDto->setPassword($password);
        $this->userDto->setRole($role);
        $this->userDto->setResetPassword('');
        $this->userDto->setSessionId('');
        $this->userDto->setShoppingCardId(0);
    }
}
