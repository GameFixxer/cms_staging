<?php
declare(strict_types=1);

namespace App\Client\User\Persistence\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

/** @Entity */
class User
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    protected $id;
    /** @Column(type="string") */
    protected $username;
    /** @Column(type="string") */
    protected $password;
    /** @Column(type="string") */
    protected $role;
    /** @Column(type="string") */
    protected $session_id;
    /** @Column(type="string") */
    protected $resetPassword;
    /** @Column(type="integer") */
    protected $shoppingCard_id;
    /** @Column(type="string") */
    protected $addressIds;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * @param mixed $username
     */
    public function setUsername($username): void
    {
        $this->username = $username;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password): void
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param mixed $role
     */
    public function setRole($role): void
    {
        $this->role = $role;
    }

    /**
     * @return mixed
     */
    public function getSessionId()
    {
        return $this->session_id;
    }

    /**
     * @param mixed $session_id
     */
    public function setSessionId($session_id): void
    {
        $this->session_id = $session_id;
    }

    /**
     * @return mixed
     */
    public function getResetPassword()
    {
        return $this->resetPassword;
    }

    /**
     * @param mixed $resetPassword
     */
    public function setResetPassword($resetPassword): void
    {
        $this->resetPassword = $resetPassword;
    }

    /**
     * @return mixed
     */
    public function getShoppingCardId()
    {
        return $this->shoppingCard_id;
    }

    /**
     * @param mixed $shoppingCard_id
     */
    public function setShoppingCardId($shoppingCard_id): void
    {
        $this->shoppingCard_id = $shoppingCard_id;
    }

    /**
     * @return mixed
     */
    public function getAddressIds()
    {
        return $this->addressIds;
    }

    /**
     * @param mixed $addressIds
     */
    public function setAddressIds($addressIds): void
    {
        $this->addressIds = $addressIds;
    }


}
