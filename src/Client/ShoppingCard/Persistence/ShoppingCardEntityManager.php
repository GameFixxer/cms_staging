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
            'shopping_card'         => $this->extractArticleNumber($shoppingCardDataProvider->getProduct()),
            'User_id'        => $shoppingCardDataProvider->getUser()->getId()
        ];

        if (!$entity instanceof ShoppingCard) {
            $transaction= $this->database->insert('shoppingcard')->values($values);
        } else {
            $values ['id'] =  $entity->getId();
            $transaction = $this->database->update('shoppingcard')->values($values)->where('id', '=', $entity->getId());
        }

        $transaction->run();

        $shoppingCardDataProvider = $this->shoppingCardRepository->getByUserId($shoppingCardDataProvider->getUser()->getId());

        return $shoppingCardDataProvider;
    }
    private function extractArticleNumber(array $products):string
    {
        $articleNumbers = "";
        foreach ($products as $article) {
            $articleNumbers = $articleNumbers.$article->getArticleNumber();
        }
        return $articleNumbers;
    }
}
