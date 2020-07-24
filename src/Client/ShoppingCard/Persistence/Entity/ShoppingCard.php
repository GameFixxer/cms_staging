<?php
declare(strict_types=1);

namespace App\Client\ShoppingCard\Persistence\Entity;

use App\Client\Product\Persistence\Entity\Product;
use App\Client\User\Persistence\Entity\User;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Relation\BelongsTo;
use Cycle\Annotated\Annotation\Relation\HasMany;


/** @Entity */

class ShoppingCard
{
    /**
     * @Column(type="primary")
     * @var int
     */
    protected $id;

    /**
     * @HasMany(target = "product",   nullable = true)
     */
    protected ?Product $product;

    /**
     * @BelongsTo(target = "user",   nullable = true, )
     */
    protected User $user;

    /**
     * @Column(type="int"  )
     * @var int
     */
    protected $amount;

    /**
     * @Column(type="int"  )
     * @var int
     */
    protected $sum;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return Product
     */
    public function getProduct(): ?Product
    {
        return $this->product;
    }

    /**
     * @param Product $product
     */
    public function setProduct(?Product $product): void
    {
        $this->product = $product;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
    }

    /**
     * @return int
     */
    public function getAmount(): int
    {
        return $this->amount;
    }

    /**
     * @param int $amount
     */
    public function setAmount(int $amount): void
    {
        $this->amount = $amount;
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
    


}
