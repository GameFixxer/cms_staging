<?php
declare(strict_types=1);

namespace App\Client\ShoppingCard\Persistence\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

/**@Entity */
class ShoppingCard
{
    /**
     * @Id
     * @Column(type=int)
     * @GeneratedValue
     */
    protected $id;
    /** @Column(type=int) */
    protected $sum;
    /** @Column(type=int) */
    protected $quantity;
    /** @Column(type=int) */
    protected $userId;
    /** @Column(type=string) */
    protected $shoppingCard;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getSum()
    {
        return $this->sum;
    }

    /**
     * @param mixed $sum
     */
    public function setSum($sum): void
    {
        $this->sum = $sum;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param mixed $userId
     */
    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getShoppingCard()
    {
        return $this->shoppingCard;
    }

    /**
     * @param mixed $shoppingCard
     */
    public function setShoppingCard($shoppingCard): void
    {
        $this->shoppingCard = $shoppingCard;
    }

}
