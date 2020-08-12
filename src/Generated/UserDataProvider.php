<?php
declare(strict_types=1);
namespace App\Generated;

/**
 * Auto generated data provider
 */
final class UserDataProvider extends \Xervice\DataProvider\Business\Model\DataProvider\AbstractDataProvider implements \Xervice\DataProvider\Business\Model\DataProvider\DataProviderInterface
{
    /** @var string */
    protected $username = '';

    /** @var string */
    protected $password = '';

    /** @var string */
    protected $role = '';

    /** @var string */
    protected $sessionId = '';

    /** @var string */
    protected $resetPassword = '';

    /** @var int */
    protected $id;

    /** @var \App\Generated\ShoppingCardDataProvider */
    protected $shoppingCard;


    /**
     * @return string
     */
    public function getUsername(): string
    {
        return $this->username;
    }


    /**
     * @param string $username
     * @return UserDataProvider
     */
    public function setUsername(string $username = '')
    {
        $this->username = $username;

        return $this;
    }


    /**
     * @return UserDataProvider
     */
    public function unsetUsername()
    {
        $this->username = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasUsername()
    {
        return ($this->username !== null && $this->username !== []);
    }


    /**
     * @return string
     */
    public function getPassword(): string
    {
        return $this->password;
    }


    /**
     * @param string $password
     * @return UserDataProvider
     */
    public function setPassword(string $password = '')
    {
        $this->password = $password;

        return $this;
    }


    /**
     * @return UserDataProvider
     */
    public function unsetPassword()
    {
        $this->password = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasPassword()
    {
        return ($this->password !== null && $this->password !== []);
    }


    /**
     * @return string
     */
    public function getRole(): string
    {
        return $this->role;
    }


    /**
     * @param string $role
     * @return UserDataProvider
     */
    public function setRole(string $role = '')
    {
        $this->role = $role;

        return $this;
    }


    /**
     * @return UserDataProvider
     */
    public function unsetRole()
    {
        $this->role = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasRole()
    {
        return ($this->role !== null && $this->role !== []);
    }


    /**
     * @return string
     */
    public function getSessionId(): string
    {
        return $this->sessionId;
    }


    /**
     * @param string $sessionId
     * @return UserDataProvider
     */
    public function setSessionId(string $sessionId = '')
    {
        $this->sessionId = $sessionId;

        return $this;
    }


    /**
     * @return UserDataProvider
     */
    public function unsetSessionId()
    {
        $this->sessionId = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasSessionId()
    {
        return ($this->sessionId !== null && $this->sessionId !== []);
    }


    /**
     * @return string
     */
    public function getResetPassword(): string
    {
        return $this->resetPassword;
    }


    /**
     * @param string $resetPassword
     * @return UserDataProvider
     */
    public function setResetPassword(string $resetPassword = '')
    {
        $this->resetPassword = $resetPassword;

        return $this;
    }


    /**
     * @return UserDataProvider
     */
    public function unsetResetPassword()
    {
        $this->resetPassword = null;

        return $this;
    }


    /**
     * @return bool
     */
    public function hasResetPassword()
    {
        return ($this->resetPassword !== null && $this->resetPassword !== []);
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
     * @return UserDataProvider
     */
    public function setId(int $id)
    {
        $this->id = $id;

        return $this;
    }


    /**
     * @return UserDataProvider
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
     * @return \App\Generated\ShoppingCardDataProvider
     */
    public function getShoppingCard(): ShoppingCardDataProvider
    {
        return $this->shoppingCard;
    }


    /**
     * @param \App\Generated\ShoppingCardDataProvider $shoppingCard
     * @return UserDataProvider
     */
    public function setShoppingCard(ShoppingCardDataProvider $shoppingCard)
    {
        $this->shoppingCard = $shoppingCard;

        return $this;
    }


    /**
     * @return UserDataProvider
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
     * @return UserDataProvider
     */
    public function addShoppingCard(ShoppingCardDataProvider $ShoppingCard)
    {
        $this->shoppingCard[] = $ShoppingCard; return $this;
    }


    /**
     * @return array
     */
    protected function getElements(): array
    {
        return array (
          'username' =>
          array (
            'name' => 'username',
            'allownull' => false,
            'default' => '\'\'',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'password' =>
          array (
            'name' => 'password',
            'allownull' => false,
            'default' => '\'\'',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'role' =>
          array (
            'name' => 'role',
            'allownull' => false,
            'default' => '\'\'',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'sessionId' =>
          array (
            'name' => 'sessionId',
            'allownull' => false,
            'default' => '\'\'',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
          ),
          'resetPassword' =>
          array (
            'name' => 'resetPassword',
            'allownull' => false,
            'default' => '\'\'',
            'type' => 'string',
            'is_collection' => false,
            'is_dataprovider' => false,
            'isCamelCase' => false,
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
        );
    }
}
