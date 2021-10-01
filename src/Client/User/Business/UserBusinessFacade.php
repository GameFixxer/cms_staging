<?php
declare(strict_types=1);

namespace App\Client\User\Business;

use App\Client\User\Persistence\UserEntityManagerInterface;
use App\Client\User\Persistence\UserRepositoryInterface;
use App\Generated\Dto\UserDataTransferObject;


class UserBusinessFacade implements UserBusinessFacadeInterface
{
    private UserRepositoryInterface $userRepository;
    private UserEntityManagerInterface $userEntityManager;

    public function __construct(UserRepositoryInterface $userRepository, UserEntityManagerInterface $userEntityManager)
    {
        $this->userRepository = $userRepository;
        $this->userEntityManager = $userEntityManager;
    }

    public function get(string $username): ?UserDataTransferObject
    {
        return $this->userRepository->getUser($username);
    }
    /**
     * @return UserDataTransferObject[]
     */
    public function getList():array
    {
        return$this->userRepository->getUserList();
    }

    public function save(UserDataTransferObject $user):UserDataTransferObject
    {
        return $this->userEntityManager->save($user);
    }
    public function delete(UserDataTransferObject $user):void
    {
        $this->userEntityManager->delete($user);
    }
}
