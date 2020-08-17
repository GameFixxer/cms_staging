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
    private \Spiral\Database\DatabaseInterface $database;
    private ORM $orm;

    public function __construct(ORM $orm, UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
        $this->orm = $orm;
        $this->ormUserRepository = $orm->getRepository(User::class);
        $this->database = $orm->getSource(User::class)->getDatabase();
    }

    public function delete(UserDataProvider $user):void
    {
        $transaction = new Transaction($this->orm);
        $transaction->delete($this->ormUserRepository->findByPK($user->getId()));
        $transaction->run();

        $this->userRepository->getList();
    }

    public function save(UserDataProvider $user): UserDataProvider
    {
        $entity = $this->ormUserRepository ->findByPK($user->getid());
        $values = [
            'username' =>  $user->getUsername(),
            'password' =>  $user->getPassword(),
            'role'     =>  $user->getRole(),
            'session_id'  => $user->getSessionId(),
            'resetpassword' => $user->getResetPassword(),
            'shoppingcard_id'  => $user->getShoppingCardId()
        ];

        dump($values , $user->toArray());

        if (!$entity instanceof User) {
            $transaction= $this->database->insert('user')->values($values);
        } else {
            $values ['id'] =  $entity->getId();
            //$transaction = $this->database->update('user')->values($values)->where('id', '=', $entity->getId());
            $transaction = $this->database->update('user', $values, ['id' => $entity->getId()]);
        }
        dump(__LINE__, 'Before firing transaction->run() Username:'.$user->getUsername());
        dump(__LINE__, 'Before firing transaction->run() DTO:', $this->userRepository->get($user->getUsername()));
        $transaction->run();
        dump(__LINE__, 'After firing transaction->run() Username:'.$user->getUsername());
        dump(__LINE__, 'After firing transaction->run() DTO:', $this->userRepository->get($user->getUsername()));
        return $this->userRepository->get($user->getUsername());
    }
}
