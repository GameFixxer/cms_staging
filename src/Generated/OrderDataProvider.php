<?php
declare(strict_types=1);
namespace App\Generated;

/**
 * Auto generated data provider
 */
final class OrderDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var int */
    protected $id;

    /** @var \App\Generated\UserDataProvider */
    protected $user;

    /** @var \App\Generated\AddressDataProvider */
    protected $address;

    /** @var int */
    protected $sum;

    /** @var \App\Generated\ShoppingCardDataProvider */
    protected $shoppingCard;

    /** @var string */
    protected $status = '';

    /** @var \App\Generated\DataProvider */
    protected $dateOfOrder;


    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }


    /**
     * @param int $id
     * @return OrderDataProvider
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }


    /**
     * @return OrderDataProvider
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
     * @return \App\Generated\UserDataProvider
     */
    public function getUser(): UserDataProvider
    {
        return $this->user;
    }


    /**
     * @param \App\Generated\UserDataProvider $user
     * @return OrderDataProvider
     */
    public function setUser(UserDataProvider $user)
    {
        $this->user = $user;

        return $this;
    }


    /**
     * @return OrderDataProvider
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
     * @return OrderDataProvider
     */
    public function addUser(UserDataProvider $User)
    {
        $this->user[] = $User; return $this;
    }


    /**
     * @return \App\Generated\AddressDataProvider
     */
    public function getAddress(): AddressDataProvider
    {
        return $this->address;
    }


    /**
     * @param \App\Generated\AddressDataProvider $address
     * @return OrderDataProvider
     */
    public function setAddress(AddressDataProvider $address)
    {
        $this->address = $address;

        return $this;
    }


    /**
     * @return OrderDataProvider
     */
    public function unsetAddress()
    {
        $this->address = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasAddress()
    {
        return ($this->address !== null && $this->address !== []);
    }


    /**
     * @param \App\Generated\AddressDataProvider $Address
     * @return OrderDataProvider
     */
    public function addAddress(AddressDataProvider $Address)
    {
        $this->address[] = $Address; return $this;
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
     * @return OrderDataProvider
     */
    public function setSum(int $sum)
    {
        $this->sum = $sum;

        return $this;
    }


    /**
     * @return OrderDataProvider
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
     * @return \App\Generated\ShoppingCardDataProvider
     */
    public function getShoppingCard(): ShoppingCardDataProvider
    {
        return $this->shoppingCard;
    }


    /**
     * @param \App\Generated\ShoppingCardDataProvider $shoppingCard
     * @return OrderDataProvider
     */
    public function setShoppingCard(ShoppingCardDataProvider $shoppingCard)
    {
        $this->shoppingCard = $shoppingCard;

        return $this;
    }


    /**
     * @return OrderDataProvider
     */
    public function unsetShoppingCard()
    {
        $this->shoppingCard = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasShoppingCard()
    {
        return ($this->shoppingCard !== null && $this->shoppingCard !== []);
    }


    /**
     * @param \App\Generated\ShoppingCardDataProvider $ShoppingCard
     * @return OrderDataProvider
     */
    public function addShoppingCard(ShoppingCardDataProvider $ShoppingCard)
    {
        $this->shoppingCard[] = $ShoppingCard; return $this;
    }


    /**
     * @return string
     */
    public function getStatus(): string
    {
        return $this->status;
    }


    /**
     * @param string $status
     * @return OrderDataProvider
     */
    public function setStatus(string $status = '')
    {
        $this->status = $status;

        return $this;
    }


    /**
     * @return OrderDataProvider
     */
    public function unsetStatus()
    {
        $this->status = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasStatus()
    {
        return ($this->status !== null && $this->status !== []);
    }


    /**
     * @return \App\Generated\DataProvider
     */
    public function getDateOfOrder(): DataProvider
    {
        return $this->dateOfOrder;
    }


    /**
     * @param \App\Generated\DataProvider $dateOfOrder
     * @return OrderDataProvider
     */
    public function setDateOfOrder(DataProvider $dateOfOrder)
    {
        $this->dateOfOrder = $dateOfOrder;

        return $this;
    }


    /**
     * @return OrderDataProvider
     */
    public function unsetDateOfOrder()
    {
        $this->dateOfOrder = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasDateOfOrder()
    {
        return ($this->dateOfOrder !== null && $this->dateOfOrder !== []);
    }


    /**
     * @return array
     */
    protected function getElements(): array
    {
        return array (
          'id' =>
          array (
            'name' => 'id',
            'allownull' => false,
            'default' => '',
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
          'address' =>
          array (
            'name' => 'address',
            'allownull' => false,
            'default' => '',
            'type' => '\\App\\Generated\\AddressDataProvider',
            'is_collection' => false,
            'is_dataprovider' => true,
            'isCamelCase' => false,
            'singleton' => 'Address',
            'singleton_type' => '\\App\\Generated\\AddressDataProvider',
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
          'shoppingCard' =>
          array (
            'name' => 'shoppingCard',
            'allownull' => false,
            'default' => '',
            'type' => '\\App\\Generated\\ShoppingCardDataProvider',
            'is_collection' => false,
            'is_dataprovider' => true,
            'isCamelCase' => false,
            'singleton' => 'ShoppingCard',
            'singleton_type' => '\\App\\Generated\\ShoppingCardDataProvider',
          ),
          'status' =>
          array (
            'name' => 'status',
            'allownull' => false,
            'default' => '\'\'',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'dateOfOrder' =>
          array (
            'name' => 'dateOfOrder',
            'allownull' => false,
            'default' => '',
            'type' => '\\App\\Generated\\DataProvider',
            'is_collection' => false,
            'is_dataprovider' => true,
            'isCamelCase' => false,
          ),
        );
    }
}
