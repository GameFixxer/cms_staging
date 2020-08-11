<?php


namespace App\Generated\Dto;

use App\Client\Address\Persistence\Entity\Address;
use App\Client\User\Persistence\Entity\User;
use DateTime;
use DateTimeImmutable;

class OrderDataTransferObject
{
    protected int $orderId;
    protected $user;
    protected $address;
    protected int $sum;
    protected string $status;
    protected string $orderedProducts;
    protected DateTimeImmutable $dateOfOrder;



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
}
