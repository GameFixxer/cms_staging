<?php

namespace App\Model;

class ProductDataTransferObject
{
    private string $name;
    private int $id;
    private string $desc;

    public function __construct()
    {

    }

    public function setProductName(string $name)
    {
        $this->name = $name;
    }

    public function setProductId(int $id)
    {
        $this->id = $id;
    }

    public function setProductDescr(string $desc)
    {
        $this->desc = $desc;
    }


    public function getProductId(): string
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