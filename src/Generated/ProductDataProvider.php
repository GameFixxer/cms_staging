<?php
declare(strict_types=1);
namespace App\Generated;

/**
 * Auto generated data provider
 */
final class ProductDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var string */
    protected $name = '';

    /** @var string */
    protected $description = '';

    /** @var string */
    protected $articleNumber = '';

    /** @var \App\Generated\CategoryDataProvider */
    protected $category;

    /** @var \App\Generated\AttributeDataProvider[] */
    protected $attribute = [];

    /** @var int */
    protected $id;

    /** @var int */
    protected $price;


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }


    /**
     * @param string $name
     * @return ProductDataProvider
     */
    public function setName(string $name = '')
    {
        $this->name = $name;

        return $this;
    }


    /**
     * @return ProductDataProvider
     */
    public function unsetName()
    {
        $this->name = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasName()
    {
        return ($this->name !== null && $this->name !== []);
    }


    /**
     * @return string
     */
    public function getDescription(): string
    {
        return $this->description;
    }


    /**
     * @param string $description
     * @return ProductDataProvider
     */
    public function setDescription(string $description = '')
    {
        $this->description = $description;

        return $this;
    }


    /**
     * @return ProductDataProvider
     */
    public function unsetDescription()
    {
        $this->description = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasDescription()
    {
        return ($this->description !== null && $this->description !== []);
    }


    /**
     * @return string
     */
    public function getArticleNumber(): string
    {
        return $this->articleNumber;
    }


    /**
     * @param string $articleNumber
     * @return ProductDataProvider
     */
    public function setArticleNumber(string $articleNumber = '')
    {
        $this->articleNumber = $articleNumber;

        return $this;
    }


    /**
     * @return ProductDataProvider
     */
    public function unsetArticleNumber()
    {
        $this->articleNumber = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasArticleNumber()
    {
        return ($this->articleNumber !== null && $this->articleNumber !== []);
    }


    /**
     * @return \App\Generated\CategoryDataProvider
     */
    public function getCategory(): CategoryDataProvider
    {
        return $this->category;
    }


    /**
     * @param \App\Generated\CategoryDataProvider $category
     * @return ProductDataProvider
     */
    public function setCategory(CategoryDataProvider $category)
    {
        $this->category = $category;

        return $this;
    }


    /**
     * @return ProductDataProvider
     */
    public function unsetCategory()
    {
        $this->category = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasCategory()
    {
        return ($this->category !== null && $this->category !== []);
    }


    /**
     * @param \App\Generated\CategoryDataProvider $Category
     * @return ProductDataProvider
     */
    public function addCategory(CategoryDataProvider $Category)
    {
        $this->category[] = $Category; return $this;
    }


    /**
     * @return \App\Generated\AttributeDataProvider[]
     */
    public function getAttribute(): array
    {
        return $this->attribute;
    }


    /**
     * @param \App\Generated\AttributeDataProvider[] $attribute
     * @return ProductDataProvider
     */
    public function setAttribute(array $attribute)
    {
        $this->attribute = $attribute;

        return $this;
    }


    /**
     * @return ProductDataProvider
     */
    public function unsetAttribute()
    {
        $this->attribute = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasAttribute()
    {
        return ($this->attribute !== null && $this->attribute !== []);
    }


    /**
     * @param \App\Generated\AttributeDataProvider $Attribute
     * @return ProductDataProvider
     */
    public function addAttribute(AttributeDataProvider $Attribute)
    {
        $this->attribute[] = $Attribute; return $this;
    }


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


    /**
     * @param int $id
     * @return ProductDataProvider
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }


    /**
     * @return ProductDataProvider
     */
    public function unsetId()
    {
        $this->id = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasId()
    {
        return ($this->id !== null && $this->id !== []);
    }


    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }


    /**
     * @param int $price
     * @return ProductDataProvider
     */
    public function setPrice(int $price)
    {
        $this->price = $price;

        return $this;
    }


    /**
     * @return ProductDataProvider
     */
    public function unsetPrice()
    {
        $this->price = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasPrice()
    {
        return ($this->price !== null && $this->price !== []);
    }


    /**
     * @return array
     */
    protected function getElements(): array
    {
        return array (
          'name' =>
          array (
            'name' => 'name',
            'allownull' => false,
            'default' => '\'\'',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'description' =>
          array (
            'name' => 'description',
            'allownull' => false,
            'default' => '\'\'',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'articleNumber' =>
          array (
            'name' => 'articleNumber',
            'allownull' => false,
            'default' => '\'\'',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'category' =>
          array (
            'name' => 'category',
            'allownull' => false,
            'default' => '',
            'type' => '\\App\\Generated\\CategoryDataProvider',
            'is_collection' => false,
            'is_dataprovider' => true,
            'isCamelCase' => false,
            'singleton' => 'Category',
            'singleton_type' => '\\App\\Generated\\CategoryDataProvider',
          ),
          'attribute' =>
          array (
            'name' => 'attribute',
            'allownull' => false,
            'default' => '',
            'type' => '\\App\\Generated\\AttributeDataProvider[]',
            'is_collection' => true,
            'is_dataprovider' => false,
            'isCamelCase' => false,
            'singleton' => 'Attribute',
            'singleton_type' => '\\App\\Generated\\AttributeDataProvider',
          ),
          'id' =>
          array (
            'name' => 'id',
            'allownull' => false,
            'default' => '0',
            'type' => 'int',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'price' =>
          array (
            'name' => 'price',
            'allownull' => false,
            'default' => '0',
            'type' => 'int',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
        );
    }
}
