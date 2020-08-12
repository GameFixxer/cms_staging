<?php


namespace App\Client\ShoppingCard\Business;

use App\Client\ShoppingCard\Persistence\ShoppingCardEntityManagerInterface;
use App\Client\ShoppingCard\Persistence\ShoppingCardRepositoryInterface;
use App\Generated\ShoppingCardDataProvider;

class ShoppingCardBusinessFacade implements ShoppingCardBusinessFacadeInterface
{
    private ShoppingCardRepositoryInterface $shoppingCardRepository;
    private ShoppingCardEntityManagerInterface $shoppingCardEntityManager;

    public function __construct(
        ShoppingCardRepositoryInterface $shoppingCardRepository,
        ShoppingCardEntityManagerInterface $shoppingCardEntityManager
    ) {
        $this->shoppingCardRepository = $shoppingCardRepository;
        $this->shoppingCardEntityManager = $shoppingCardEntityManager;
    }

    public function get(int $id): ?ShoppingCardDataProvider
    {
        return $this->shoppingCardRepository->get($id);
    }

    /**
     * @param ShoppingCardDataProvider $shoppingCardDataProvider
     * @return ShoppingCardDataProvider
     */

    public function save(ShoppingCardDataProvider $shoppingCardDataProvider):ShoppingCardDataProvider
    {
        return $this->shoppingCardEntityManager->save($shoppingCardDataProvider);
    }
    public function delete(ShoppingCardDataProvider $shoppingCardDataProvider)
    {
        $this->shoppingCardEntityManager->delete($shoppingCardDataProvider);
    }
}
