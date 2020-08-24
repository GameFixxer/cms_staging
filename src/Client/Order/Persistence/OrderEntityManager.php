<?php
declare(strict_types=1);

namespace App\Client\Order\Persistence;

use App\Client\Order\Persistence\Entity\Order;
use App\Client\User\Persistence\Entity\User;
use App\Generated\OrderDataProvider;
use Cycle\ORM\ORM;
use Cycle\ORM\Transaction;

class OrderEntityManager implements OrderEntityManagerInterface
{
    /**
     * @var OrderRepository
     */
    private OrderRepository $orderRepository;
    private \Cycle\ORM\RepositoryInterface $repository;
    private \Spiral\Database\DatabaseInterface $database;

    private ORM $orm;

    public function __construct(ORM $orm, OrderRepository $orderRepository)
    {
        $this->orderRepository = $orderRepository;
        $this->orm = $orm;
        $this->repository = $orm->getRepository(Order::class);
        $this->database = $orm->getSource(User::class)->getDatabase();
    }



    public function delete(OrderDataProvider $order):void
    {
        $transaction = new Transaction($this->orm);
        $transaction->delete($this->repository->findOne(['orderId'=>$order->getId()]));
        $transaction->run();

        $this->orderRepository->getList();
    }

    public function save(OrderDataProvider $order): OrderDataProvider
    {
        $transaction = new Transaction($this->orm);
        $values = [
            'sum' =>  $order->getSum(),
            'status' =>  $order->getStatus(),
            'ordered_products'  => $this->shrinkProductToArticleNumber($order->getShoppingCard()->getProduct()),
            'user_id' => $order->getUser()->getId(),
            'address_address_id'  => $order->getAddress()->getAddress_id(),
            'shopping_card_id'  => $order->getShoppingCard()->getId(),
            'date_of_order'  => $order->getDateOfOrder()
        ];
        if (!$this->repository->findByPK($order->getId()) instanceof Order) {
            $transaction= $this->database->insert('orders')->values($values);
        } else {
            $values ['order_id'] =  $order->getId();
            $transaction = $this->database->update('orders', $values, ['order_id' => $order->getId()]);
        }
        $transaction->run();

        $newOrder = $this->orderRepository->getWithDateAndUserId($order->getUser()->getId(), $order->getDateOfOrder());

        if (! $newOrder instanceof OrderDataProvider) {
            throw new \Exception('Fatal error while saving/loading', 1);
        }
        return $newOrder;
    }
    private function shrinkProductToArticleNumber(array $products):string
    {
        $articleNumber = [];
        foreach ($products as $article) {
            $articleNumber[]=$article->getArticleNumber();
        }
        return implode(',', $articleNumber);
    }
}
