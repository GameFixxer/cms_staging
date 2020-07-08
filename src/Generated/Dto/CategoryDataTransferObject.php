<?php


namespace App\Generated\Dto;

use App\Client\Product\Persistence\Entity\Product;

class CategoryDataTransferObject implements DataTransferObjectInterface
{
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
}
