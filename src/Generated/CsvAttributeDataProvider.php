<?php
declare(strict_types=1);
namespace App\Generated;

/**
 * Auto generated data provider
 */
final class CsvAttributeDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var int */
    protected $attributeId;

    /** @var string */
    protected $attributeKey = '';

    /** @var string */
    protected $attributeValue = '';


    /**
     * @return int
     */
    public function getAttributeId(): int
    {
        return $this->attributeId;
    }


    /**
     * @param int $attributeId
     * @return CsvAttributeDataProvider
     */
    public function setAttributeId(int $attributeId)
    {
        $this->attributeId = $attributeId;

        return $this;
    }


    /**
     * @return CsvAttributeDataProvider
     */
    public function unsetAttributeId()
    {
        $this->attributeId = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasAttributeId()
    {
        return ($this->attributeId !== null && $this->attributeId !== []);
    }


    /**
     * @return string
     */
    public function getAttributeKey(): string
    {
        return $this->attributeKey;
    }


    /**
     * @param string $attributeKey
     * @return CsvAttributeDataProvider
     */
    public function setAttributeKey(string $attributeKey = '')
    {
        $this->attributeKey = $attributeKey;

        return $this;
    }


    /**
     * @return CsvAttributeDataProvider
     */
    public function unsetAttributeKey()
    {
        $this->attributeKey = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasAttributeKey()
    {
        return ($this->attributeKey !== null && $this->attributeKey !== []);
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
     * @return CsvAttributeDataProvider
     */
    public function setAttributeValue(string $attributeValue = '')
    {
        $this->attributeValue = $attributeValue;

        return $this;
    }


    /**
     * @return CsvAttributeDataProvider
     */
    public function unsetAttributeValue()
    {
        $this->attributeValue = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasAttributeValue()
    {
        return ($this->attributeValue !== null && $this->attributeValue !== []);
    }


    /**
     * @return array
     */
    protected function getElements(): array
    {
        return array (
          'attributeId' =>
          array (
            'name' => 'attributeId',
            'allownull' => false,
            'default' => '0',
            'type' => 'int',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'attributeKey' =>
          array (
            'name' => 'attributeKey',
            'allownull' => false,
            'default' => '\'\'',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'attributeValue' =>
          array (
            'name' => 'attributeValue',
            'allownull' => false,
            'default' => '\'\'',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
        );
    }
}
