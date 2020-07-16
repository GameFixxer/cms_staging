<?php
declare(strict_types=1);

namespace App\Generated\Dto;

class CsvCategoryDataTransferObject
{
    private string $categoryKey = "";

    /**
     * @return string
     */

    private int $id =0;

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
    }


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
