<?php


namespace App\Frontend\ShoppingCard\Business;

use App\Client\ShoppingCard\Business\ShoppingCardBusinessFacadeInterface;
use App\Client\ShoppingCard\Persistence\Entity\ShoppingCard;
use App\Client\User\Business\UserBusinessFacadeInterface;
use App\Client\User\Persistence\Entity\User;
use App\Generated\Dto\ShoppingCardDataTransferObject;

class ShoppingCardManager implements ShoppingCardManagerInterface
{
    private ShoppingCardBusinessFacadeInterface $shoppingCardBusinessFacade;
    private UserBusinessFacadeInterface $userBusinessFacade;
    private \Cycle\ORM\RepositoryInterface $repository;

    public function __construct(ShoppingCardBusinessFacadeInterface $productBusinessFacade,\Cycle\ORM\ORM $ormAttributeRepository)
    {
        $this->shoppingCardBusinessFacade = $productBusinessFacade;
        $this->repository = $ormAttributeRepository->getRepository(ShoppingCard::class);
    }

    public function delete(ShoppingCardDataTransferObject $shoppingCardDataTransferObject): void
    {
        if ($this->shoppingCardBusinessFacade->get($shoppingCardDataTransferObject->getUser()) instanceof ShoppingCardDataTransferObject) {
            $this->shoppingCardBusinessFacade->delete($shoppingCardDataTransferObject);
        }
    }

    public function save(ShoppingCardDataTransferObject $shoppingCardDataTransferObject): void
    {
        $productDTO = $this->shoppingCardBusinessFacade->get($shoppingCardDataTransferObject->getUser()());
        if (!$productDTO instanceof ShoppingCardDataTransferObject) {
            $shoppingCardDataTransferObject->getUser()((string)rand(1, 2229));
        }
        $this->shoppingCardBusinessFacade->save($shoppingCardDataTransferObject);
    }

    public function getUser(String $username)
    {
        return $this->repository->findOne(['username'=>$username]);
    }
}
