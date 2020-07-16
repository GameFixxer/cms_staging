<?php

declare(strict_types=1);

namespace App\Generated\Dto;

use App\Client\Category\Persistence\Entity\Category;

class ProductDataTransferObject implements DataTransferObjectInterface
{
    private string $name = '';
    private int $id = 0;
    private string $articleNumber = '';
    private string $desc = '';
    private ?object $category = null;
    private ?object $attribute = null;

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
