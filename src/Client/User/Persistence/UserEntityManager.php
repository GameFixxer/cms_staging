<?php

declare(strict_types=1);

namespace App\Client\User\Persistence;

use App\Client\User\Persistence\Entity\User;
use App\Generated\UserDataProvider;
use Cycle\ORM\ORM;
use Cycle\ORM\Transaction;

class UserEntityManager implements UserEntityManagerInterface
{
    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;
    private \Cycle\ORM\RepositoryInterface $ormUserRepository;
    private ORM $orm;

    public function __construct(ORM $orm, UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->orm = $orm;
        $this->ormUserRepository = $orm->getRepository(User::class);
    }

    public function delete(UserDataProvider $user):void
    {
        $transaction = new Transaction($this->orm);
        $transaction->delete($this->ormUserRepository->findByPK($user->getId()));
        $transaction->run();

        $this->userRepository->getUserList();
    }

    public function save(UserDataProvider $user): UserDataProvider
    {
        $transaction = new Transaction($this->orm);
        $entity = $this->ormUserRepository->findByPK($user->getId());

        if (!$entity instanceof User) {
            $entity = new User();
        }
        $entity->setUsername($user->getUserName());
        $entity->setPassword($user->getPassword());
        $entity->setRole($user->getRole());
        $entity->setSessionId($user->getSessionId());
        $entity->setResetPassword($user->getResetPassword());
        $entity->setShoppingCard($user->getShoppingCard());
        $transaction->persist($entity);
        $transaction->run();

        $user->setId($entity->getId());

        return $user;
    }
}
