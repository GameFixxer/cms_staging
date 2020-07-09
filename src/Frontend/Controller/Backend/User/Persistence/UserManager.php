<?php
declare(strict_types=1);

namespace App\Frontend\Controller\Backend\User\Persistence;

use App\Client\User\Business\UserBusinessFacadeInterface;
use App\Generated\Dto\UserDataTransferObject;

class UserManager implements UserManagerInterface
{
    private UserBusinessFacadeInterface $userBusinessFacade;

    public function __construct(UserBusinessFacadeInterface $userBusinessFacade)
    {
        $this->userBusinessFacade = $userBusinessFacade;
    }

    public function delete(UserDataTransferObject $user): void
    {
        if ($this->userBusinessFacade->get($user->getUsername()) instanceof UserDataTransferObject) {
            $this->userBusinessFacade->delete($user);
        }
    }

    public function save(UserDataTransferObject $user): void
    {
        $userDTO = $this->userBusinessFacade->get($user->getUsername());
        if ($userDTO instanceof UserDataTransferObject) {
            $user->setUserId($userDTO->getUserId());
        }
        $this->userBusinessFacade->save($user);
    }
}
