<?php
declare(strict_types=1);
namespace App\Client\ShoppingCard\Persistence;

use App\Client\ShoppingCard\Persistence\Entity\ShoppingCard;
use App\Generated\Dto\ShoppingCardDataTransferObject;
use Cycle\ORM\ORM;
use Cycle\ORM\Transaction;

class ShoppingCardEntityManager implements ShoppingCardEntityManagerInterface
{
    /**
     * @var ShoppingCardRepositoryInterface
     */
    private ShoppingCardRepositoryInterface $shoppingCardRepository;
    private \Cycle\ORM\RepositoryInterface $repository;

    private ORM $orm;

    public function __construct(ORM $orm, ShoppingCardRepositoryInterface $shoppingCardRepository)
    {
        $this->shoppingCardRepository = $shoppingCardRepository;
        $this->orm = $orm;
        $this->repository = $orm->getRepository(ShoppingCard::class);
    }



    public function delete(ShoppingCardDataTransferObject $shoppingCardDataTransferObject):void
    {
        $transaction = new Transaction($this->orm);
        $transaction->delete($this->repository->findOne(['user'=>$shoppingCardDataTransferObject->getUser()]));
        $transaction->run();

        $this->shoppingCardRepository->getShoppingCardList();
    }

    public function save(ShoppingCardDataTransferObject $shoppingCardDataTransferObject): ShoppingCardDataTransferObject
    {
        $transaction = new Transaction($this->orm);


        $entity = $this->repository->findOne(['user'=>$shoppingCardDataTransferObject->getUser()]);
        if (!$entity instanceof ShoppingCard) {
            $entity = new ShoppingCard();
        }
        $entity->setProduct($shoppingCardDataTransferObject->getProduct());
        $entity->setAmount($shoppingCardDataTransferObject->getAmount());
        $entity->setSum($shoppingCardDataTransferObject->getSum());
        $transaction->persist($entity);
        $transaction->run();
        $shoppingCardDataTransferObject->setId($entity->getId());

        return $shoppingCardDataTransferObject;
    }
}
