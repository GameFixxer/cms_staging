<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Entity\User;
use App\Model\Dto\UserDataTransferObject;
use App\Model\Mapper\UserMapperInterface;
use Cycle\ORM\ORM;

class UserRepository
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

        $userEntityList = (array) $this->ormUserRepository->select()->fetchALl();
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
