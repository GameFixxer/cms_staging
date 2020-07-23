<?php


namespace App\Generated\Dto;

class AttributeDataTransferObject implements DataTransferObjectInterface
{
    private string $attributeKey;
    private int $attributeId;
    private string $attributeValue;
    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->attributeKey;
    }

    /**
     * @param string $attributeKey
     */
    public function setKey(string $attributeKey): void
    {
        $this->attributeKey = $attributeKey;
    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->attributeId;
    }

    /**
     * @param int $attributeId
     */
    public function setId(int $attributeId): void
    {
        $this->attributeId = $attributeId;
    }

    /**
     * @return string
     */
    public function getValue(): string
    {
        return $this->attributeValue;
    }

    /**
     * @param string $attributeValue
     */
    public function setValue(string $attributeValue): void
    {
        $this->attributeValue = $attributeValue;
    }

}
