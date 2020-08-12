<?php
declare(strict_types=1);
namespace App\Generated;

/**
 * Auto generated data provider
 */
final class ShoppingCardDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var \App\Generated\ProductDataProvider[] */
    protected $product = [];

    /** @var int */
    protected $id;

    /** @var int */
    protected $sum;

    /** @var int */
    protected $quantity;

    /** @var \App\Generated\UserDataProvider */
    protected $user;


    /**
     * @return \App\Generated\ProductDataProvider[]
     */
    public function getProduct(): array
    {
        return $this->product;
    }


    /**
     * @param \App\Generated\ProductDataProvider[] $product
     * @return ShoppingCardDataProvider
     */
    public function setProduct(array $product)
    {
        $this->product = $product;

        return $this;
    }


    /**
     * @return ShoppingCardDataProvider
     */
    public function unsetProduct()
    {
        $this->product = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasProduct()
    {
        return ($this->product !== null && $this->product !== []);
    }


    /**
     * @param \App\Generated\ProductDataProvider $Product
     * @return ShoppingCardDataProvider
     */
    public function addProduct(ProductDataProvider $Product)
    {
        $this->product[] = $Product; return $this;
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
     * @return ShoppingCardDataProvider
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }


    /**
     * @return ShoppingCardDataProvider
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
    public function getSum(): int
    {
        return $this->sum;
    }


    /**
     * @param int $sum
     * @return ShoppingCardDataProvider
     */
    public function setSum(int $sum)
    {
        $this->sum = $sum;

        return $this;
    }


    /**
     * @return ShoppingCardDataProvider
     */
    public function unsetSum()
    {
        $this->sum = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasSum()
    {
        return ($this->sum !== null && $this->sum !== []);
    }


    /**
     * @return int
     */
    public function getQuantity(): int
    {
        return $this->quantity;
    }


    /**
     * @param int $quantity
     * @return ShoppingCardDataProvider
     */
    public function setQuantity(int $quantity)
    {
        $this->quantity = $quantity;

        return $this;
    }


    /**
     * @return ShoppingCardDataProvider
     */
    public function unsetQuantity()
    {
        $this->quantity = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasQuantity()
    {
        return ($this->quantity !== null && $this->quantity !== []);
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
     * @return ShoppingCardDataProvider
     */
    public function setUser(UserDataProvider $user)
    {
        $this->user = $user;

        return $this;
    }


    /**
     * @return ShoppingCardDataProvider
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
     * @return ShoppingCardDataProvider
     */
    public function addUser(UserDataProvider $User)
    {
        $this->user[] = $User; return $this;
    }


    /**
     * @return array
     */
    protected function getElements(): array
    {
        return array (
          'product' =>
          array (
            'name' => 'product',
            'allownull' => false,
            'default' => '',
            'type' => '\\App\\Generated\\ProductDataProvider[]',
            'is_collection' => true,
            'is_dataprovider' => false,
            'isCamelCase' => false,
            'singleton' => 'Product',
            'singleton_type' => '\\App\\Generated\\ProductDataProvider',
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
          'sum' =>
          array (
            'name' => 'sum',
            'allownull' => false,
            'default' => '0',
            'type' => 'int',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'quantity' =>
          array (
            'name' => 'quantity',
            'allownull' => false,
            'default' => '0',
            'type' => 'int',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
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
        );
    }
}
