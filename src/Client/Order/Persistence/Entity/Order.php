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
     * @BelongsTo(target="user", nullable=false)
     */
    protected $user;

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
     * @Column(type="date")
     * @var \DateTimeImmutable
     */
    protected $dateOfOrder;



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
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user): void
    {
        $this->user = $user;
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
     * @return DateTimeImmutable
     */
    public function getDateOfOrder(): DateTimeImmutable
    {
        return $this->dateOfOrder;
    }

    /**
     * @param DateTimeImmutable $dateOfOrder
     */
    public function setDateOfOrder(DateTimeImmutable $dateOfOrder): void
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
