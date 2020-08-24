<?php
declare(strict_types=1);
namespace App\Generated;

/**
 * Auto generated data provider
 */
final class CsvProductDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
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

    /** @var \App\Generated\UserDataProvider */
    protected $user;

    /** @var int */
    protected $id;

    /** @var int */
    protected $price =0;

    /** @var int */
    protected $categoryId = 0;

    /** @var string */
    protected $categoryKey = '';

    /** @var int */
    protected $attributeId =0;

    /** @var string */
    protected $attributeKey = '';

    /** @var string */
    protected $attributeValue = '';


    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }


    /**
     * @param string $name
     * @return CsvProductDataProvider
     */
    public function setName(string $name = '')
    {
        $this->name = $name;

        return $this;
    }


    /**
     * @return CsvProductDataProvider
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
     * @return CsvProductDataProvider
     */
    public function setDescription(string $description = '')
    {
        $this->description = $description;

        return $this;
    }


    /**
     * @return CsvProductDataProvider
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
     * @return CsvProductDataProvider
     */
    public function setArticleNumber(string $articleNumber = '')
    {
        $this->articleNumber = $articleNumber;

        return $this;
    }


    /**
     * @return CsvProductDataProvider
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
     * @return CsvProductDataProvider
     */
    public function setCategory(CategoryDataProvider $category)
    {
        $this->category = $category;

        return $this;
    }


    /**
     * @return CsvProductDataProvider
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
     * @return CsvProductDataProvider
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
     * @return CsvProductDataProvider
     */
    public function setAttribute(array $attribute)
    {
        $this->attribute = $attribute;

        return $this;
    }


    /**
     * @return CsvProductDataProvider
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
     * @return CsvProductDataProvider
     */
    public function addAttribute(AttributeDataProvider $Attribute)
    {
        $this->attribute[] = $Attribute; return $this;
    }


    /**
     * @return \App\Generated\UserDataProvider
     */
    public function getUser(): UserDataProvider
    {
        return $this->user;
    }


    /**
     * @param \App\Generated\UserDataProvider $user
     * @return CsvProductDataProvider
     */
    public function setUser(UserDataProvider $user)
    {
        $this->user = $user;

        return $this;
    }


    /**
     * @return CsvProductDataProvider
     */
    public function unsetUser()
    {
        $this->user = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasUser()
    {
        return ($this->user !== null && $this->user !== []);
    }


    /**
     * @param \App\Generated\UserDataProvider $User
     * @return CsvProductDataProvider
     */
    public function addUser(UserDataProvider $User)
    {
        $this->user[] = $User; return $this;
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
     * @return CsvProductDataProvider
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }


    /**
     * @return CsvProductDataProvider
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
     * @return CsvProductDataProvider
     */
    public function setPrice(int $price)
    {
        $this->price = $price;

        return $this;
    }


    /**
     * @return CsvProductDataProvider
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
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }


    /**
     * @param int $categoryId
     * @return CsvProductDataProvider
     */
    public function setCategoryId(int $categoryId)
    {
        $this->categoryId = $categoryId;

        return $this;
    }


    /**
     * @return CsvProductDataProvider
     */
    public function unsetCategoryId()
    {
        $this->categoryId = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasCategoryId()
    {
        return ($this->categoryId !== null && $this->categoryId !== []);
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
     * @return CsvProductDataProvider
     */
    public function setCategoryKey(string $categoryKey = '')
    {
        $this->categoryKey = $categoryKey;

        return $this;
    }


    /**
     * @return CsvProductDataProvider
     */
    public function unsetCategoryKey()
    {
        $this->categoryKey = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasCategoryKey()
    {
        return ($this->categoryKey !== null && $this->categoryKey !== []);
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
     * @return CsvProductDataProvider
     */
    public function setAttributeId(int $attributeId)
    {
        $this->attributeId = $attributeId;

        return $this;
    }


    /**
     * @return CsvProductDataProvider
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
     * @return CsvProductDataProvider
     */
    public function setAttributeKey(string $attributeKey = '')
    {
        $this->attributeKey = $attributeKey;

        return $this;
    }


    /**
     * @return CsvProductDataProvider
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
     * @return CsvProductDataProvider
     */
    public function setAttributeValue(string $attributeValue = '')
    {
        $this->attributeValue = $attributeValue;

        return $this;
    }


    /**
     * @return CsvProductDataProvider
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
          'user' =>
          array (
            'name' => 'user',
            'allownull' => false,
            'default' => '',
            'type' => '\\App\\Generated\\UserDataProvider',
            'is_collection' => false,
            'is_dataprovider' => true,
            'isCamelCase' => false,
            'singleton' => 'User',
            'singleton_type' => '\\App\\Generated\\UserDataProvider',
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
          'categoryId' =>
          array (
            'name' => 'categoryId',
            'allownull' => false,
            'default' => '0',
            'type' => 'int',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'categoryKey' =>
          array (
            'name' => 'categoryKey',
            'allownull' => false,
            'default' => '\'\'',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
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
