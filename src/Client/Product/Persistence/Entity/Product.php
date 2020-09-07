<?php
declare(strict_types=1);

namespace App\Client\Product\Persistence\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

/** @Entity */
class Product
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    protected $id;
    /** @Column(type="integer") */
    protected $price;
    /** @Column(type="integer") */
    protected $categoryId;
    /** @Column(type="string") */
    protected $attributeKey;
    /** @Column(type="string") */
    protected $articleNumber;
    /** @Column(type="string") */
    protected $name;
    /** @Column(type="string") */
    protected $description;

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
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price): void
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getCategoryId()
    {
        return $this->categoryId;
    }

    /**
     * @param mixed $categoryId
     */
    public function setCategoryId($categoryId): void
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @return mixed
     */
    public function getAttributeKey()
    {
        return $this->attributeKey;
    }

    /**
     * @param mixed $attributeKey
     */
    public function setAttributeKey($attributeKey): void
    {
        $this->attributeKey = $attributeKey;
    }

    /**
     * @return mixed
     */
    public function getArticleNumber()
    {
        return $this->articleNumber;
    }

    /**
     * @param mixed $articleNumber
     */
    public function setArticleNumber($articleNumber): void
    {
        $this->articleNumber = $articleNumber;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }


}
