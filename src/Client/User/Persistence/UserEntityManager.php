<?php

declare(strict_types=1);

namespace App\Client\User\Persistence;

use App\Client\User\Persistence\Entity\User;
use App\Generated\UserDataProvider;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;


class UserEntityManager implements UserEntityManagerInterface
{
    /**
     * @var UserRepository
     */
    private UserRepository $userRepository;
    private EntityManager $entityManager;
    private EntityRepository $repository;

    public function __construct(EntityManager $entityManager, UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->entityManager = $entityManager;
        $this->repository = $entityManager->getRepository(User::class);
    }

    public function delete(UserDataProvider $user):void
    {
        $this->entityManager->remove($user);
        $this->userRepository->getList();
    }

    public function save(UserDataProvider $user): UserDataProvider
    {
        if ($user->hasId()) {
            $this->repository->createQueryBuilder('c')
                ->set('c.addressId', ':addressId')
                ->set('c.password', ':password')
                ->set('c.resetPassword', ':resetPassword')
                ->set('c.role', ':role')
                ->set('c.session_id', ':session_id')
                ->set('c.shoppingCard_id', ':shoppingCard_id')
                ->set('c.username', ':username')
                ->where('c.id = :categoryId')
                ->setParameter(':addressId', $user->getAddressId())
                ->setParameter(':password', $user->getPassword())
                ->setParameter(':resetPassword', $user->getResetPassword())
                ->setParameter(':session_id', $user->getSessionId())
                ->setParameter(':shoppingCard_id', $user->getShoppingCardId())
                ->setParameter(':username', $user->getUsername())
                ->getQuery()
                ->execute();

            $this->entityManager->clear();
        } else {
            $categoryEntity = new User();
            $categoryEntity = $this->convert($categoryEntity, $user);

            $this->entityManager->persist($categoryEntity);
            $this->entityManager->flush();
        }

        $newUser = $this->userRepository->get($user->getUsername());
        if (! $newUser instanceof UserDataProvider) {
            throw new \Exception('Fatal error while saving/loading', 1);
        }
        return $newUser;
    }
    private function convert(User $userEntity, UserDataProvider $userDataProvider):User
    {
        return $userEntity;
    }
}
