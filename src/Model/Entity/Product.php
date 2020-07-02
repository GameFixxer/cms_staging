<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Relation\BelongsTo;

/**
 * @Entity(
 *     table = "product"
 * )
 */
class Product implements EntityInterface
{
    public const TABLE = 'product';


    /**
     * @Column(type="primary")
     * @var int
     */
    protected $id;

    /**
     * @BelongsTo(target = "Category",  nullable = true)
     */
    protected $category;

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
     * @param int
     */
    public function setId(int $id):void {
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
