<?php

declare(strict_types=1);

namespace App\Model\Dto;

class ProductDataTransferObject
{
    private string $name = '';
    private int $id = 0;
    private string $articleNumber = '';
    private string $desc = '';


    public function setProductName(string $name): void
    {
        $this->name = $name;
    }

    public function setProductId(int $id): void
    {
        $this->id = $id;
    }
    public function setArticleNumber(string $articleNumber): void
    {
        $this->articleNumber = $articleNumber;
    }

    public function setProductDescription(string $desc): void
    {
        $this->desc = $desc;
    }

    public function getProductId(): int
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

    public function getProductDescription(): string
    {
        return $this->desc;
    }
}
