<?php
declare(strict_types=1);

namespace App\Client\ShoppingCard\Business;

use App\Client\ShoppingCard\Persistence\ShoppingCardEntityManagerInterface;
use App\Client\ShoppingCard\Persistence\ShoppingCardRepositoryInterface;
use App\Client\User\Persistence\Entity\User;
use App\Generated\Dto\ShoppingCardDataTransferObject;

class ShoppingCardBusinessFacade implements ShoppingCardBusinessFacadeInterface
{
    private ShoppingCardRepositoryInterface $shoppingCardRepository;
    private ShoppingCardEntityManagerInterface $shoppingCardEntityManager;

    public function __construct(ShoppingCardRepositoryInterface $shoppingCardRepository, ShoppingCardEntityManagerInterface $shoppingCardEntityManager)
    {
        $this->shoppingCardRepository = $shoppingCardRepository;
        $this->shoppingCardEntityManager = $shoppingCardEntityManager;
    }

    public function get(User $user): ?ShoppingCardDataTransferObject
    {
        return $this->shoppingCardRepository->getShoppingCard($user);
    }

    /**
     * @return ShoppingCardDataTransferObject[]
     */

    public function getList():array
    {
        return$this->shoppingCardRepository->getShoppingCardList();
    }
    public function save(ShoppingCardDataTransferObject $shoppingCardDataTransferObject):ShoppingCardDataTransferObject
    {
        return $this->shoppingCardEntityManager->save($shoppingCardDataTransferObject);
    }
    public function delete(ShoppingCardDataTransferObject $shoppingCardDataTransferObject)
    {
        $this->shoppingCardEntityManager->delete($shoppingCardDataTransferObject);
    }
}
