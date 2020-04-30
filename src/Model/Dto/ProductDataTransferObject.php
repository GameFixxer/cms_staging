<?php

declare(strict_types=1);

namespace App\Model\Dto;

class ProductDataTransferObject
{
    private string $name;
    private int $id;
    private string $desc;

    public function __construct()
    {
        $this->name = '';
        $this->desc = '';
        $this->id = 0;
    }

    public function setProductName(string $name): void
    {
        $this->name = $name;
    }

    public function setProductId(int $id): void
    {
        $this->id = $id;
    }

    public function setProductDescr(string $desc): void
    {
        $this->desc = $desc;
    }

    public function getProductId(): int
    {
        return $this->id;
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
