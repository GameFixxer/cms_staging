<?php


namespace App\Model\Dto;

class CsvDataTransferObject
{

    private string $name = '';
    private int $id = 0;
    private string $articleNumber = '';
    private string $desc = '';
    private string $category = '';
    private int $categoryId = 0;
    private string $categoryKey = "";

    public function getCategoryId(): int
    {
        return $this->categoryId;
    }

    public function setCategoryId(int $id):void
    {
        $this->categoryId = $id;
    }

    /**
     * @return string
     */
    public function getCategoryKey(): string
    {
        return $this->categoryKey;
    }

    /**
     * @param string $categoryKey
     */

    public function setCategoryKey(string $categoryKey): void
    {
        $this->categoryKey = $categoryKey;
    }


    public function setProductName(string $name): void
    {
        $this->name = $name;
    }

    public function setCategory(string $category): void
    {
        $this->category = $category;
    }

    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function setNumber(string $articleNumber): void
    {
        $this->articleNumber = $articleNumber;
    }

    public function setProductDescription(string $desc): void
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
    public function getProductName(): string
    {
        return $this->name;
    }

    public function getCategory(): string
    {
        return $this->category;
    }

    public function getProductDescription(): string
    {
        return $this->desc;
    }

    public function setArticleNumber(string $articleNumber):void
    {
        $this->articleNumber = $articleNumber;
    }
}
