<?php


namespace App\Model\Dto;

use App\Model\Entity\Product;

class CategoryDataTransferObject
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
