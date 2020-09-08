<?php
declare(strict_types=1);

namespace App\Client\ShoppingCard\Persistence;

use App\Client\ShoppingCard\Persistence\Entity\ShoppingCard;
use App\Client\ShoppingCard\Persistence\Mapper\ShoppingCardMapperInterface;
use App\Generated\ShoppingCardDataProvider;
use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;

class ShoppingCardRepository implements ShoppingCardRepositoryInterface
{
    private ShoppingCardMapperInterface $shoppingCardMapper;
    private EntityRepository $repository;

    public function __construct(ShoppingCardMapperInterface $shoppingCardMapper, EntityManager $entityManager)
    {
        $this->shoppingCardMapper = $shoppingCardMapper;
        $this->repository = $entityManager->getRepository(ShoppingCard::class);
    }

    /**
     * @return ShoppingCardDataProvider
     */

    public function get(int $id): ShoppingCardDataProvider
    {
        $addressEntity = $this->repository->findBy(['shoppingCard_id'=>$id]);
        if (!isset($addressEntity)) {
            throw new \Exception('Critical RepositoryError', 1);
        }
        return $this->shoppingCardMapper->map($addressEntity[0]);
    }

    public function getByUserId(int $id): ShoppingCardDataProvider
    {
        $addressEntity = $this->repository->findBy(['User_id'=>$id]);
        if (!isset($addressEntity)) {
            throw new \Exception('Critical RepositoryError', 1);
        }
        return $this->shoppingCardMapper->map($addressEntity[0]);
    }
}
