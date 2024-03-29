<?php
declare(strict_types=1);

namespace App\Client\Product\Persistence\Entity;

use App\Client\Attribute\Persistence\Entity\Attribute;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Relation\BelongsTo;

use Cycle\Annotated\Annotation\Relation\ManyToMany;
use Cycle\ORM\Relation\Pivoted\PivotedCollection;

/** @Entity */
class Product
{
    public const TABLE = 'product';


    /**
     * @Column(type="primary")
     * @var int
     */
    protected $id;


    /**
     * @Column(type="int", nullable = true)
     * @var int
     */
    protected $price;

    /**
     * @return int
     */
    public function getPrice(): ?int
    {
        return $this->price;
    }

    /**
     * @param int|null $price
     *
     * @return void
     */
    public function setPrice(?int $price): void
    {
        $this->price = $price;
    }

    /**
     * @BelongsTo(target = "category",   nullable = true)
     */
    protected $category;

    /**
     * @ManyToMany(target = "attribute",  though = "ProductAttribute", nullable = true)
     */
    protected $attribute;

    public function __construct()
    {
        $this->attribute = new PivotedCollection();
    }

    public function getAttribute()
    {
        return $this->attribute;
    }

    /**
     * @param \App\Client\Attribute\Persistence\Entity\Attribute|null $attribute
     *
     * @return void
     */
    public function addAttribute(?Attribute  $attribute): void
    {
        if (isset($attribute)) {
            $this->getAttribute()->add($attribute);
        }
    }

    public function removeAttribute(?Attribute  $attribute): void
    {
        $this->getAttribute()->removeElement($attribute);
    }


    /**
     * @Column(type="string")
     * @var string
     */
    protected $articleNumber;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $name;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $description;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


    /**
     * @param int $id
     *
     * @return void
     */
    public function setId(int $id):void
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getArticleNumber(): string
    {
        return $this->articleNumber;
    }

    /**
     * @return string
     */
    public function getProductName(): string
    {
        return $this->name;
    }
    /**
     * @param string $name
     */

    public function setProductName(string $name): void
    {
        $this->name = $name;
    }


    public function getCategory()
    {
        return $this->category;
    }
    /**
     * @param  $category
     */
    public function setCategory($category): void
    {
        $this->category = $category;
    }

    /**
     * @return string
     */
    public function getProductDescription(): string
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setProductDescription(string $description): void
    {
        $this->description = $description;
    }
    /**
     * @param string $articleNumber
     */
    public function setArticleNumber(string $articleNumber)
    {
        $this->articleNumber = $articleNumber;
    }
}
