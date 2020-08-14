<?php
declare(strict_types=1);

namespace App\Client\User\Persistence\Mapper;

use App\Client\ShoppingCard\Business\ShoppingCardBusinessFacadeInterface;
use App\Generated\UserDataProvider;
use App\Client\User\Persistence\Entity\User;


class UserMapper implements UserMapperInterface
{
    private ShoppingCardBusinessFacadeInterface $shoppingCardBusinessFacade;

    public function __construct(ShoppingCardBusinessFacadeInterface $shoppingCardBusinessFacade)
    {
        $this->shoppingCardBusinessFacade = $shoppingCardBusinessFacade;
    }

    public function map(User $user): UserDataProvider
    {
        $userDataTransferObject = new UserDataProvider();
        $userDataTransferObject->setId((int)$user->getId());
        $userDataTransferObject->setUsername($user->getUsername());
        $userDataTransferObject->setPassword($user->getPassword());
        $userDataTransferObject->setRole($user->getRole());
        $userDataTransferObject->setSessionId($user->getSessionId());
        $userDataTransferObject->setResetPassword($user->getResetPassword());
        $userDataTransferObject->setShoppingCard($this->shoppingCardBusinessFacade->get($user->getShoppingCard()->getId()));


        return $userDataTransferObject;
    }
}
