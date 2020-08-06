<?php
declare(strict_types=1);

namespace App\Client\User\Persistence\Entity;

use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Relation\HasMany;
use PhpParser\Node\Scalar\String_;

/**
 * @Entity(
 *     table = "user"
 *     )
 */
class User
{
    public const TABLE = 'user';
    /**
     * @Column(type="primary")
     * @var int
     */
    protected $id;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $username;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $password;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $role;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $session_id;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $resetpassword;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $shoppingCard;

    /**
     * @HasMany(target="address", nullable= true)
     */
    protected $address;

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getShoppingCard(): string
    {
        return $this->shoppingCard;
    }

    /**
     * @param string $shoppingCard
     */
    public function setShoppingCard(string $shoppingCard): void
    {
        $this->shoppingCard = $shoppingCard;
    }

    public function getSessionId():string
    {
        return $this->session_id;
    }

    public function setSessionId(string $sessionId):void
    {
        $this->session_id = $sessionId;
    }

    public function getResetPassword():string
    {
        return $this->resetpassword;
    }

    public function setResetPassword(string $reset):void
    {
        $this->resetpassword = $reset;
    }

    public function getRole():string
    {
        return $this->role;
    }

    public function setRole(string $role):void
    {
        $this->role = $role;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUsername(): string
    {
        return $this->username;
    }

    public function setUsername(string $username): void
    {
        $this->username = $username;
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
     */
    public function setPassword(string $password): void
    {
        $this->password = $password;
    }
}
