<?php

declare(strict_types=1);
namespace App\Generated\Dto;

class CsvProductDataTransferObject
{
    private string $name = '';
    private int $id = 0;
    private string $articleNumber = '';
    private string $desc = '';
    private ?object $category = null;
    private ?string $categoryKey = null;
    private int $categoryId = 0;
    private string $attributeValue = '';
    private string $attributeKey = '';
    private ?object $attribute = null;
    private ?object $product = null;
    private int $attributeId = 0;
    private ?int $price = null;

    /**
     * @return int|null
     */
    public function getPrice(): ?int
    {
        return $this->price;
    }

    /**
     * @param int|null $price
     */
    public function setPrice(?int $price): void
    {
        $this->price = $price;
    }

    /**
     * @return int
     */
    public function getAttributeId(): int
    {
        return $this->attributeId;
    }

    /**
     * @param int $attributeId
     */
    public function setAttributeId(int $attributeId): void
    {
        $this->attributeId = $attributeId;
    }

    /**
     * @return object|null
     */
    public function getProduct(): ?object
    {
        return $this->product;
    }

    /**
     * @param object|null $product
     */
    public function setProduct(?object $product): void
    {
        $this->product = $product;
    }

    /**
     * @return object|null
     */
    public function getAttribute(): ?object
    {
        return $this->attribute;
    }

    /**
     * @param object|null $attribute
     */
    public function setAttribute(?object $attribute): void
    {
        $this->attribute = $attribute;
    }


    /**
     * @return string
     */
    public function getAttributeValue(): string
    {
        return $this->attributeValue;
    }

    /**
     * @param string $attributeValue
     */
    public function setAttributeValue(string $attributeValue): void
    {
        $this->attributeValue = $attributeValue;
    }

    /**
     * @return string
     */
    public function getAttributeKey(): string
    {
        return $this->attributeKey;
    }

    /**
     * @param string $attributeKey
     */
    public function setAttributeKey(string $attributeKey): void
    {
        $this->attributeKey = $attributeKey;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getCategory(): ?Object
    {
        return $this->category;
    }

    public function setCategory(?Object $id):void
    {
        $this->category = $id;
    }
    public function setCategoryId(int $id):void
    {
        $this->categoryId = $id;
    }
    public function getCategoryId():int
    {
        return $this->categoryId;
    }

    public function getKey(): ?string
    {
        return $this->categoryKey;
    }

    public function setKey(?string $key):void
    {
        $this->categoryKey = $key;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }

    public function setDescription(string $desc): void
    {
        $this->desc = $desc;
    }

    public function getId(): int
    {
        return $this->id;
    }
    public function getArticleNumber(): string
    {
        return $this->articleNumber;
    }
    public function getName(): string
    {
        return $this->name;
    }

    public function getDescription(): string
    {
        return $this->desc;
    }

    public function setArticleNumber(string $articleNumber):void
    {
        $this->articleNumber = $articleNumber;
    }
}
