<?php

declare(strict_types=1);

namespace App\Client\User\Persistence;


use App\Client\User\Persistence\Entity\User;
use App\Client\User\Persistence\Mapper\UserMapperInterface;
use App\Generated\Dto\UserDataTransferObject;
use Cycle\ORM\ORM;

class UserRepository implements UserRepositoryInterface
{
    private UserMapperInterface $userMapper;
    private \Cycle\ORM\RepositoryInterface $ormUserRepository;

    public function __construct(UserMapperInterface $userMapper, \Cycle\ORM\RepositoryInterface $ormUserRepository)
    {
        $this->userMapper = $userMapper;
        $this->ormUserRepository = $ormUserRepository;
    }

    /**
     * @return UserDataTransferObject[]
     */
    public function getUserList(): array
    {
        $userList = [];

        $userEntityList = (array)$this->ormUserRepository->select()->fetchALl();
        /** @var  User $user */
        foreach ($userEntityList as $user) {
            $userList[] = $this->userMapper->map($user);
        }

        return $userList;
    }

    public function getUser(string $username): ?UserDataTransferObject
    {
        $userEntity = $this->ormUserRepository->findOne([
            'username' => $username
        ]);
        if ($userEntity instanceof User) {
            return $this->userMapper->map($userEntity);
        }
        return null;
    }
}
