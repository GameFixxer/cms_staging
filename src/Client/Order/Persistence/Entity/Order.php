<?php
declare(strict_types=1);

namespace App\Client\Order\Persistence\Entity;


use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

/** @Entity */
class Order
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    protected $id;
    /** @Column(type="integer") */
    protected $userId;
    /** @Column(type="integer") */
    protected $addressId;
    /** @Column(type="integer") */
    protected $sum;
    /** @Column(type="string") */
    protected $status;
    /** @Column(type="string") */
    protected $dateOfOrder;
    /** @Column(type="integer") */
    protected $shoppingCardId;
    /** @Column(type="integer") */
    protected $orderedProducts;

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
    public function getAddressId()
    {
        return $this->addressId;
    }

    /**
     * @param mixed $addressId
     */
    public function setAddressId($addressId): void
    {
        $this->addressId = $addressId;
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
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param mixed $status
     */
    public function setStatus($status): void
    {
        $this->status = $status;
    }

    /**
     * @return mixed
     */
    public function getDateOfOrder()
    {
        return $this->dateOfOrder;
    }

    /**
     * @param mixed $dateOfOrder
     */
    public function setDateOfOrder($dateOfOrder): void
    {
        $this->dateOfOrder = $dateOfOrder;
    }

    /**
     * @return mixed
     */
    public function getShoppingCardId()
    {
        return $this->shoppingCardId;
    }

    /**
     * @param mixed $shoppingCardId
     */
    public function setShoppingCardId($shoppingCardId): void
    {
        $this->shoppingCardId = $shoppingCardId;
    }

    /**
     * @return mixed
     */
    public function getOrderedProducts()
    {
        return $this->orderedProducts;
    }

    /**
     * @param mixed $orderedProducts
     */
    public function setOrderedProducts($orderedProducts): void
    {
        $this->orderedProducts = $orderedProducts;
    }

}
