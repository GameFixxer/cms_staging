<?php


namespace App\Generated\Dto;

use App\Client\Category\Persistence\Entity\Category;
use PhpParser\Node\Expr\Cast\Object_;

class CsvDataTransferObject
{
    private string $name = '';
    private string $articleNumber = '';
    private string $desc = '';
    private ?Category $category = null;
    private int $categoryId = 0;
    private string $categoryKey = "";
    private ?int $productId = null;

    /**
     * @return int|null
     */
    public function getProductId(): ?int
    {
        return $this->productId;
    }

    /**
     * @param int|null $productId
     */
    public function setProductId(?int $productId): void
    {
        $this->productId = $productId;
    }

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

    public function setCategory($category): void
    {
        $this->category = $category;
    }

    public function setNumber(string $articleNumber): void
    {
        $this->articleNumber = $articleNumber;
    }

    public function setProductDescription(string $desc): void
    {
        $this->desc = $desc;
    }

    public function getArticleNumber(): string
    {
        return $this->articleNumber;
    }
    public function getProductName(): string
    {
        return $this->name;
    }

    public function getCategory(): ?Object
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
