<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Entity\User;
use App\Model\Mapper\UserMapper;
use App\Model\Dto\UserDataTransferObject;
use Cycle\ORM\ORM;

class UserRepository
{
    private UserMapper $userMapper;
    private \Cycle\ORM\RepositoryInterface $ormUserRepository;

    public function __construct(ORM $orm)
    {
        $this->userMapper = new UserMapper();
        $this->ormUserRepository = $orm->getRepository(User::class);
    }

    /**
     * @return UserDataTransferObject[]
     */
    public function getUserList(): array
    {
        $userList = [];

        $userEntityList = $this->ormUserRepository->select()->fetchALl();

        foreach ($userEntityList as $product) {
            $userList[] = $this->userMapper->map($product);
        }

        return $userList;
    }

    public function getUser(string $username, string $password): ?UserDataTransferObject
    {
        $userEntity = $this->ormUserRepository->findOne([
            'username' => $username,
            'password' => $password
        ]);
        if ($userEntity instanceof User) {
            return $this->userMapper->map($userEntity);
        }
        return null;
    }
}
