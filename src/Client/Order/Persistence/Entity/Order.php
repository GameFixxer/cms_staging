<?php
declare(strict_types=1);

namespace App\Client\Order\Persistence\Entity;

use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Relation\BelongsTo;
use DateTime;
use DateTimeImmutable;

/** @Entity */
class Order
{
    /**
     * @Column(type="primary")
     * @var int
     */
    protected $orderId;

    /**
     * @Column(type="int")
     * @var int
     */
    protected $userId;

    /**
     * @BelongsTo(target="address", nullable=false)
     */
    protected $address;

    /**
     * @Column(type="int")
     * @var int
     */
    protected $sum;

    /**
     * @Column(type="Enum(inProgress, shipping, delivered)", nullable=false)
     */
    protected $status;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $dateOfOrder;

    /**
     * @Column(type="int")
     * @var int
     */
    protected $shoppingCardId;

    /**
     * @return int
     */
    public function getShoppingCardId()
    {
        return $this->shoppingCardId;
    }

    /**
     * @param int $shoppingCardId
     */
    public function setShoppingCardId($shoppingCardId): void
    {
        $this->shoppingCardId = $shoppingCardId;
    }



    /**
     * @return int
     */
    public function getOrderId(): int
    {
        return $this->orderId;
    }

    /**
     * @param int $orderId
     */
    public function setOrderId(int $orderId): void
    {
        $this->orderId = $orderId;
    }

    /**
     * @return int
     */
    public function getUserId()
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId($userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * @return int
     */
    public function getSum(): int
    {
        return $this->sum;
    }

    /**
     * @param int $sum
     */
    public function setSum(int $sum): void
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
     * @return string
     */
    public function getDateOfOrder(): string
    {
        return $this->dateOfOrder;
    }

    /**
     * @param string $dateOfOrder
     */
    public function setDateOfOrder(string $dateOfOrder): void
    {
        $this->dateOfOrder = $dateOfOrder;
    }

    /**
     * @return string
     */
    public function getOrderedProducts(): string
    {
        return $this->orderedProducts;
    }

    /**
     * @param string $orderedProducts
     */
    public function setOrderedProducts(string $orderedProducts): void
    {
        $this->orderedProducts = $orderedProducts;
    }

    /**
     * @Column(type="string", nullable=false)
     * @var string
     */
    protected $orderedProducts;
}
