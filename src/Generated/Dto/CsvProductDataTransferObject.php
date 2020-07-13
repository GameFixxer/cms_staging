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
