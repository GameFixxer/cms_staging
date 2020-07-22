<?php


namespace App\Client\Attribute\Persistence\Entity;

use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Relation\BelongsTo;
use Cycle\Annotated\Annotation\Relation\HasMany;
use Cycle\Annotated\Annotation\Relation\ManyToMany;
use Cycle\ORM\Relation\Pivoted\PivotedCollection;

/** @Entity */
class Attribute
{
    public const TABLE = 'attribute';
    /**
     * @Column(type="primary")
     * @var int
     */
    protected $attribute_id;

    /**
     * @Column( unique = "true", type="string")
     * @var string
     */
    protected $attribute_key;

    /*
    /**
     * @ManyToMany(target = "product",  though = "ProductAttribute", nullable = true)
     */
    /*
    protected $product;

    public function __construct()
    {
        $this->product = new PivotedCollection();
    }

    public function getProduct()
    {
        return $this->product;
    }

    public function setProduct($product): void
    {
        $this->product = $product;
    }*/


    /**
     * @Column( unique = "true", type="string")
     * @var string
     */
    protected $attribute_value;


    /**
     * @return string
     */
    public function getAttributeValue(): string
    {
        return $this->attribute_value;
    }

    /**
     * @param string $attribute_value
     */
    public function setAttributeValue(string $attribute_value): void
    {
        $this->attribute_value = $attribute_value;
    }


    /**
     * @param int $attributeId
     */
    public function setAttributeId(int $attributeId):void
    {
        $this->attribute_id = $attributeId;
    }

    /**
     * @return int
     */
    public function getAttributeId(): int
    {
        return $this->attribute_id;
    }
    /**
     * @return string
     */
    public function getAttributeKey(): string
    {
        return $this->attribute_key;
    }

    /**
     * @param string $attribute_key
     */

    public function setAttributeKey(string $attribute_key): void
    {
        $this->attribute_key = $attribute_key;
    }
}
