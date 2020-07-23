<?php

declare(strict_types=1);

namespace App\Client\ShoppingCard\Persistence;

use App\Client\ShoppingCard\Persistence\Entity\ShoppingCard;
use App\Client\ShoppingCard\Persistence\Mapper\ShoppingCardMapperInterface;
use App\Client\User\Persistence\Entity\User;
use App\Generated\Dto\ShoppingCardDataTransferObject;
use Cycle\ORM\ORM;

class ShoppingCardRepository implements ShoppingCardRepositoryInterface
{
    private ShoppingCardMapperInterface $shoppingCardMapper;
    private \Cycle\ORM\RepositoryInterface $repository;

    /**
     * ProductRepository constructor.
     * @param ShoppingCardMapperInterface $productMapper
     * @param \Cycle\ORM\ORM $ORM
     */
    public function __construct(ShoppingCardMapperInterface $shoppingCardMapper, \Cycle\ORM\ORM $ORM)
    {
        $this->shoppingCardMapper = $shoppingCardMapper;
        $this->repository = $ORM->getRepository(ShoppingCard::class);
    }


    /**
     * @return ShoppingCardDataTransferObject[]
     */
    public function getShoppingCardList(): array
    {
        $shoppingCardList = [];
        $shoppingCardEntityList = (array)$this->repository->select()->fetchALl();
        /** @var  ShoppingCard $shoppingCard */
        foreach ($shoppingCardEntityList as $shoppingCard) {
            $shoppingCardList[] = $this->shoppingCardMapper->map($shoppingCard);
        }
        return $shoppingCardList;
    }

    public function getShoppingCard(User $user): ?ShoppingCardDataTransferObject
    {
        $shoppingCard = $this->repository->findOne(['user'=>$user]);
        if ($shoppingCard instanceof ShoppingCard) {
            return $this->shoppingCardMapper->map($shoppingCard);
        }
        return null;
    }
}
