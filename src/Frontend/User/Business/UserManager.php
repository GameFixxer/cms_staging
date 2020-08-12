<?php
declare(strict_types=1);

namespace App\Frontend\User\Business;

use App\Client\User\Business\UserBusinessFacadeInterface;
use App\Generated\UserDataProvider;

class UserManager implements UserManagerInterface
{
    private UserBusinessFacadeInterface $userBusinessFacade;

    public function __construct(UserBusinessFacadeInterface $userBusinessFacade)
    {
        $this->userBusinessFacade = $userBusinessFacade;
    }

    public function delete(UserDataProvider $user): void
    {
        if ($this->userBusinessFacade->get($user->getUsername()) instanceof UserDataProvider) {
            $this->userBusinessFacade->delete($user);
        }
    }

    public function save(UserDataProvider $user): void
    {
        $userDTO = $this->userBusinessFacade->get($user->getUsername());
        if ($userDTO instanceof UserDataProvider) {
            $user->setId($userDTO->getId());
        }
        $this->userBusinessFacade->save($user);
    }
}
