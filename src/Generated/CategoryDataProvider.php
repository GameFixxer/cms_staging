<?php
declare(strict_types=1);
namespace App\Generated;

/**
 * Auto generated data provider
 */
final class CategoryDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var int */
    protected $categoryId = 0;

    /** @var string */
    protected $categoryKey = '';


    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->categoryId;
    }


    /**
     * @param int $categoryId
     * @return CategoryDataProvider
     */
    public function setCategoryId(int $categoryId)
    {
        $this->categoryId = $categoryId;

        return $this;
    }


    /**
     * @return CategoryDataProvider
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
     * @return CategoryDataProvider
     */
    public function setCategoryKey(string $categoryKey = '')
    {
        $this->categoryKey = $categoryKey;

        return $this;
    }


    /**
     * @return CategoryDataProvider
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
     * @return array
     */
    protected function getElements(): array
    {
        return array (
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
        );
    }
}
