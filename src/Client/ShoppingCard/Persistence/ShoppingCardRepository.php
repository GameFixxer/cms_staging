<?php
declare(strict_types=1);

namespace App\Client\ShoppingCard\Persistence;

use App\Client\ShoppingCard\Persistence\Entity\ShoppingCard;
use App\Client\ShoppingCard\Persistence\Mapper\ShoppingCardMapperInterface;
use App\Generated\ShoppingCardDataProvider;

class ShoppingCardRepository implements ShoppingCardRepositoryInterface
{
    private ShoppingCardMapperInterface $shoppingCardMapper;
    private \Cycle\ORM\RepositoryInterface $repository;

    public function __construct(ShoppingCardMapperInterface $shoppingCardMapper, \Cycle\ORM\ORM $ORM)
    {
        $this->shoppingCardMapper = $shoppingCardMapper;
        $this->repository = $ORM->getRepository(ShoppingCard::class);
    }

    /**
     * @return ShoppingCardDataProvider
     */

    public function get(int $id): ShoppingCardDataProvider
    {
        $addressEntity = $this->repository->findByPK($id);
        if (!$addressEntity instanceof ShoppingCard) {
            throw new \Exception('Critical RepositoryError', 1);
        }
        return $this->shoppingCardMapper->map($addressEntity);
    }

    public function getByUserId(int $id): ShoppingCardDataProvider
    {
        $addressEntity = $this->repository->findOne(['User_id'=>$id]);
        if (!$addressEntity instanceof ShoppingCard) {
            throw new \Exception('Critical RepositoryError', 1);
        }
        return $this->shoppingCardMapper->map($addressEntity);
    }
}
