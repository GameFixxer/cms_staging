<?php
declare(strict_types=1);

namespace App\Generated\Dto;

class CsvCategoryDataTransferObject
{
    private string $categoryKey = "";

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
