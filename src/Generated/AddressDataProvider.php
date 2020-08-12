<?php
declare(strict_types=1);
namespace App\Generated;

/**
 * Auto generated data provider
 */
final class AddressDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var int */
    protected $address_id;

    /** @var \App\Generated\UserDataProvider */
    protected $User;

    /** @var string */
    protected $country = '';

    /** @var string */
    protected $street = '';

    /** @var string */
    protected $town = '';

    /** @var int */
    protected $postcode;

    /** @var string */
    protected $type = '';

    /** @var string */
    protected $firstName = '';

    /** @var string */
    protected $lastName = '';

    /** @var bool */
    protected $active = false;


    /**
     * @return int
     */
    public function getAddress_id(): int
    {
        return $this->address_id;
    }


    /**
     * @param int $address_id
     * @return AddressDataProvider
     */
    public function setAddress_id(int $address_id)
    {
        $this->address_id = $address_id;

        return $this;
    }


    /**
     * @return AddressDataProvider
     */
    public function unsetAddress_id()
    {
        $this->address_id = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasAddress_id()
    {
        return ($this->address_id !== null && $this->address_id !== []);
    }


    /**
     * @return \App\Generated\UserDataProvider
     */
    public function getUser(): UserDataProvider
    {
        return $this->User;
    }


    /**
     * @param \App\Generated\UserDataProvider $User
     * @return AddressDataProvider
     */
    public function setUser(UserDataProvider $User)
    {
        $this->User = $User;

        return $this;
    }


    /**
     * @return AddressDataProvider
     */
    public function unsetUser()
    {
        $this->User = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasUser()
    {
        return ($this->User !== null && $this->User !== []);
    }


    /**
     * @param \App\Generated\UserDataProvider $User
     * @return AddressDataProvider
     */
    public function addUser(UserDataProvider $User)
    {
        $this->User[] = $User;
        return $this;
    }


    /**
     * @return string
     */
    public function getCountry(): string
    {
        return $this->country;
    }


    /**
     * @param string $country
     * @return AddressDataProvider
     */
    public function setCountry(string $country = '')
    {
        $this->country = $country;

        return $this;
    }


    /**
     * @return AddressDataProvider
     */
    public function unsetCountry()
    {
        $this->country = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasCountry()
    {
        return ($this->country !== null && $this->country !== []);
    }


    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }


    /**
     * @param string $street
     * @return AddressDataProvider
     */
    public function setStreet(string $street = '')
    {
        $this->street = $street;

        return $this;
    }


    /**
     * @return AddressDataProvider
     */
    public function unsetStreet()
    {
        $this->street = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasStreet()
    {
        return ($this->street !== null && $this->street !== []);
    }


    /**
     * @return string
     */
    public function getTown(): string
    {
        return $this->town;
    }


    /**
     * @param string $town
     * @return AddressDataProvider
     */
    public function setTown(string $town = '')
    {
        $this->town = $town;

        return $this;
    }


    /**
     * @return AddressDataProvider
     */
    public function unsetTown()
    {
        $this->town = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasTown()
    {
        return ($this->town !== null && $this->town !== []);
    }


    /**
     * @return int
     */
    public function getPostcode(): int
    {
        return $this->postcode;
    }


    /**
     * @param int $postcode
     * @return AddressDataProvider
     */
    public function setPostcode(int $postcode)
    {
        $this->postcode = $postcode;

        return $this;
    }


    /**
     * @return AddressDataProvider
     */
    public function unsetPostcode()
    {
        $this->postcode = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasPostcode()
    {
        return ($this->postcode !== null && $this->postcode !== []);
    }


    /**
     * @return string
     */
    public function getType(): string
    {
        return $this->type;
    }


    /**
     * @param string $type
     * @return AddressDataProvider
     */
    public function setType(string $type = '')
    {
        $this->type = $type;

        return $this;
    }


    /**
     * @return AddressDataProvider
     */
    public function unsetType()
    {
        $this->type = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasType()
    {
        return ($this->type !== null && $this->type !== []);
    }


    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }


    /**
     * @param string $firstName
     * @return AddressDataProvider
     */
    public function setFirstName(string $firstName = '')
    {
        $this->firstName = $firstName;

        return $this;
    }


    /**
     * @return AddressDataProvider
     */
    public function unsetFirstName()
    {
        $this->firstName = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasFirstName()
    {
        return ($this->firstName !== null && $this->firstName !== []);
    }


    /**
     * @return string
     */
    public function getLastName(): string
    {
        return $this->lastName;
    }


    /**
     * @param string $lastName
     * @return AddressDataProvider
     */
    public function setLastName(string $lastName = '')
    {
        $this->lastName = $lastName;

        return $this;
    }


    /**
     * @return AddressDataProvider
     */
    public function unsetLastName()
    {
        $this->lastName = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasLastName()
    {
        return ($this->lastName !== null && $this->lastName !== []);
    }


    /**
     * @return bool
     */
    public function getActive(): bool
    {
        return $this->active;
    }


    /**
     * @param bool $active
     * @return AddressDataProvider
     */
    public function setActive(bool $active = false)
    {
        $this->active = $active;

        return $this;
    }


    /**
     * @return AddressDataProvider
     */
    public function unsetActive()
    {
        $this->active = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasActive()
    {
        return ($this->active !== null && $this->active !== []);
    }


    /**
     * @return array
     */
    protected function getElements(): array
    {
        return array(
          'address_id' =>
          array(
            'name' => 'address_id',
            'allownull' => false,
            'default' => '0',
            'type' => 'int',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'User' =>
          array(
            'name' => 'User',
            'allownull' => false,
            'default' => '',
            'type' => '\\App\\Generated\\UserDataProvider',
            'is_collection' => false,
            'is_dataprovider' => true,
            'isCamelCase' => false,
            'singleton' => 'User',
            'singleton_type' => '\\App\\Generated\\UserDataProvider',
          ),
          'country' =>
          array(
            'name' => 'country',
            'allownull' => false,
            'default' => '\'\'',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'street' =>
          array(
            'name' => 'street',
            'allownull' => false,
            'default' => '\'\'',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'town' =>
          array(
            'name' => 'town',
            'allownull' => false,
            'default' => '\'\'',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'postcode' =>
          array(
            'name' => 'postcode',
            'allownull' => false,
            'default' => '0',
            'type' => 'int',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'type' =>
          array(
            'name' => 'type',
            'allownull' => false,
            'default' => '\'\'',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'firstName' =>
          array(
            'name' => 'firstName',
            'allownull' => false,
            'default' => '\'\'',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'lastName' =>
          array(
            'name' => 'lastName',
            'allownull' => false,
            'default' => '\'\'',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'active' =>
          array(
            'name' => 'active',
            'allownull' => false,
            'default' => 'false',
            'type' => 'bool',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
        );
    }
}
