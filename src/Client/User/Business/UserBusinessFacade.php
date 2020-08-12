<?php
declare(strict_types=1);

namespace App\Client\User\Business;

use App\Client\User\Persistence\Entity\User;
use App\Client\User\Persistence\UserEntityManagerInterface;
use App\Client\User\Persistence\UserRepositoryInterface;
use App\Generated\UserDataProvider;


class UserBusinessFacade implements UserBusinessFacadeInterface
{
    private UserRepositoryInterface $userRepository;
    private UserEntityManagerInterface $userEntityManager;

    public function __construct(UserRepositoryInterface $userRepository, UserEntityManagerInterface $userEntityManager)
    {
        $this->userRepository = $userRepository;
        $this->userEntityManager = $userEntityManager;
    }

    public function get(string $username): ?UserDataProvider
    {
        return $this->userRepository->get($username);
    }

    public function getEntity(string $username): ?User
    {
        return $this->userRepository->getEntity($username);
    }
    /**
     * @return UserDataProvider[]
     */
    public function getList():array
    {
        return$this->userRepository->getList();
    }

    public function save(UserDataProvider $user):UserDataProvider
    {
        return $this->userEntityManager->save($user);
    }
    public function delete(UserDataProvider $user)
    {
        $this->userEntityManager->delete($user);
    }
}
