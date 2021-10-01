<?php
declare(strict_types=1);

namespace App\Frontend\User\Business;

use App\Client\User\Business\UserBusinessFacadeInterface;
use App\Frontend\User\Business\UserManagerInterface;
use App\Generated\Dto\UserDataTransferObject;

class UserManager implements UserManagerInterface
{
    /**
     * @var \App\Client\User\Business\UserBusinessFacadeInterface
     */
    private UserBusinessFacadeInterface $userBusinessFacade;

    /**
     * @param \App\Client\User\Business\UserBusinessFacadeInterface $userBusinessFacade
     */
    public function __construct(UserBusinessFacadeInterface $userBusinessFacade)
    {
        $this->userBusinessFacade = $userBusinessFacade;
    }

    /**
     * @param \App\Generated\Dto\UserDataTransferObject $user
     */
    public function delete(UserDataTransferObject $user): void
    {
        if ($this->userBusinessFacade->get($user->getUsername()) instanceof UserDataTransferObject) {
            $this->userBusinessFacade->delete($user);
        }
    }

    /**
     * @param \App\Generated\Dto\UserDataTransferObject $user
     */
    public function save(UserDataTransferObject $user): void
    {
        $userDTO = $this->userBusinessFacade->get($user->getUsername());
        if ($userDTO instanceof UserDataTransferObject) {
            $user->setUserId($userDTO->getUserId());
        }
        $this->userBusinessFacade->save($user);
    }
}
