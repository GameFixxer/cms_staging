<?php
declare(strict_types=1);


namespace App\Generated\Dto;

use App\Client\Product\Persistence\Entity\Product;
use App\Client\User\Persistence\Entity\User;

class ShoppingCardDataTransferObject
{
    private ?int $id = 0;

    private ?Product $product = null;

    private ?User $user = null;

    private int $amount = 0;

    private int $sum = 0;


    public function getId(): int
    {
        return $this->id;
    }
    
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(Product $product): void
    {
        $this->product = $product;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }
    public function setUser(User $user): void
    {
        $this->user = $user;
    }
    public function getAmount(): int
    {
        return $this->amount;
    }

    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
    }

    public function getSum(): ?int
    {
        return $this->sum;
    }


    public function setSum(int $sum): void
    {
        $this->sum = $sum;
    }
}
