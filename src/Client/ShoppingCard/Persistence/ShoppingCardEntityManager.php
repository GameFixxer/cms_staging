<?php


namespace App\Client\ShoppingCard\Persistence;

use App\Client\ShoppingCard\Persistence\Entity\ShoppingCard;
use App\Generated\ShoppingCardDataProvider;
use Cycle\ORM\ORM;
use Cycle\ORM\Transaction;

class ShoppingCardEntityManager implements ShoppingCardEntityManagerInterface
{
    /**
     * @var ShoppingCardRepositoryInterface
     */
    private ShoppingCardRepositoryInterface $shoppingCardRepository;
    private \Cycle\ORM\RepositoryInterface $repository;
    private \Spiral\Database\DatabaseInterface $database;

    private ORM $orm;

    public function __construct(ORM $orm, ShoppingCardRepositoryInterface $shoppingCardRepository)
    {
        $this->shoppingCardRepository = $shoppingCardRepository;
        $this->orm = $orm;
        $this->repository = $orm->getRepository(ShoppingCard::class);
        $this->database = $orm->getSource(ShoppingCard::class)->getDatabase();
    }



    public function delete(ShoppingCardDataProvider $shoppingCardDataProvider):void
    {
        $transaction = new Transaction($this->orm);
        $transaction->delete($this->repository->findByPK($shoppingCardDataProvider->getid()));
        $transaction->run();

    }

    public function save(ShoppingCardDataProvider $shoppingCardDataProvider): ShoppingCardDataProvider
    {
        $entity = $this->repository->findByPK($shoppingCardDataProvider->getid());
        $values = [
            'sum'         => $shoppingCardDataProvider->getSum(),
            'quantity'      => $shoppingCardDataProvider->getQuantity(),
            'shoppingCard'         => $shoppingCardDataProvider->getProduct(),
            'user_id'        => $shoppingCardDataProvider->getUser()->getId(),
        ];

        if (!$entity instanceof ShoppingCard) {
            $transaction= $this->database->insert('shoppingCard')->values($values);
        } else {
            $values ['id'] =  $entity->getId();
            $transaction = $this->database->update('shoppingCard')->values($values)->where('id', '=', $entity->getId());
        }

        $transaction->run();

        $shoppingCardDataProvider->setId($entity->getId());

        return $shoppingCardDataProvider;
    }
}
