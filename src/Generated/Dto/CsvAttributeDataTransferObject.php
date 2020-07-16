<?php


namespace App\Generated\Dto;


class CsvAttributeDataTransferObject
{
    private string $attributeKey;

    /**
     * @return string
     */
    public function getAttributeKey(): string
    {
        return $this->attributeKey;
    }

    /**
     * @param string $attributeKey
     */
    public function setAttributeKey(string $attributeKey): void
    {
        $this->attributeKey = $attributeKey;
    }

    /**
     * @return mixed
     */
    public function getProduct()
    {
        return $this->product;
    }

    /**
     * @param mixed $product
     */
    public function setProduct($product): void
    {
        $this->product = $product;
    }

    /**
     * @return int
     */
    public function getAttributeId(): int
    {
        return $this->attributeId;
    }

    /**
     * @param int $attributeId
     */
    public function setAttributeId(int $attributeId): void
    {
        $this->attributeId = $attributeId;
    }

    /**
     * @return string
     */
    public function getAttributeValue(): string
    {
        return $this->attributeValue;
    }

    /**
     * @param string $attributeValue
     */
    public function setAttributeValue(string $attributeValue): void
    {
        $this->attributeValue = $attributeValue;
    }
    private $product;
    private int $attributeId;
    private string $attributeValue;
}