<?php
declare(strict_types=1);

namespace App\Client\ShoppingCard\Persistence\Entity;

use App\Client\Product\Persistence\Entity\Product;
use App\Client\User\Persistence\Entity\User;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Relation\BelongsTo;
use Cycle\Annotated\Annotation\Relation\HasMany;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * @Entity(
 *     table = "shoppingcard"
 *     )
 */
class ShoppingCard
{
    /**
     * @Column(type="primary")
     * @var int
     */
    protected $id;


    /**
     * @Column(type="int", nullable = true)
     * @var int
     */
    protected $sum;

    /**
     * @Column(type="int", nullable = true)
     * @var int
     */
    protected $quantity;

    /**
     * @Column(type="int", nullable = true)
     * @var int
     */
    protected $userId;

    /**
     * @Column(type="string", nullable = true)
     * @var string
     */

    protected $shoppingCard;


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
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }

    /**
     * @param int $quantity
     */
    public function setQuantity(int $quantity): void
    {
        $this->quantity = $quantity;
    }

    /**
     * @return int
     */
    public function getUserId(): int
    {
        return $this->userId;
    }

    /**
     * @param int $userId
     */
    public function setUserId(int $userId): void
    {
        $this->userId = $userId;
    }

    /**
     * @return string
     */
    public function getShoppingCard(): string
    {
        return $this->shoppingCard;
    }

    /**
     * @param string $shoppingCard
     */
    public function setShoppingCard(string $shoppingCard): void
    {
        $this->shoppingCard = $shoppingCard;
    }



}
