<?php


namespace App\Tests\integration\Model;

use App\Model\Dto\ProductDataTransferObject;
use App\Model\Dto\UserDataTransferObject;
use App\Model\Entity\User;
use App\Model\UserEntityManager;
use App\Service\DatabaseManager;
use App\Tests\integration\Helper\ContainerHelper;
use Cycle\ORM\Transaction;

class UserEntityManagerTest extends \Codeception\Test\Unit
{
    private UserDataTransferObject $userDto;
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
        $transaction->delete($ormUserRepository->findByPK($this->userDto->getUserId()));
        $transaction->run();
    }

    public function testCreateUser()
    {
        $createdProduct = $this->userEntityManager->save($this->userDto);

        $userFromRepository =  $this->container->getUserRepository()->getUser($this->userDto->getUsername());

        $this->assertSame($this->userDto->getUsername(), $userFromRepository->getUsername());
        $this->assertSame($this->userDto->getUserPassword(), $userFromRepository->getUserPassword());
        $this->assertSame($this->userDto->getUserId(), $userFromRepository->getUserId());

        return $createdProduct;
    }

    public function testUpdateUser()
    {
        $this->userDto = $this->testCreateUser();

        $this->userDto->setUsername('fabulous');
        $this->userDto->setUserPassword('even more fabulous');
        $this->userDto = $this->userEntityManager->save($this->userDto);
        $userFromRepository =  $this->container->getUserRepository()->getUser($this->userDto->getUsername());

        $this->assertSame($this->userDto->getUsername(), $userFromRepository->getUsername());
        $this->assertSame($this->userDto->getUserPassword(), $userFromRepository->getUserPassword());
        $this->assertSame($this->userDto->getUserId(), $userFromRepository->getUserId());
    }

    public function testDeleteUser()
    {
        $this->userDto = $this->testCreateUser();

        $this->userEntityManager->delete($this->userDto);

        $this->assertNull($this->container->getUserRepository()->getUser($this->userDto->getUsername()));
        $this->userDto = $this->testCreateUser();
    }

    private function createDto(String $username, String $password, String $role)
    {
        $this->userDto = new UserDataTransferObject();
        $this->userDto->setUsername($username);
        $this->userDto->setUserPassword($password);
        $this->userDto->setUserRole($role);
    }
}
