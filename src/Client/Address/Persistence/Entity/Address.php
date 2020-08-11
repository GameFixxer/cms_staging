<?php


namespace App\Client\Address\Persistence\Entity;

use App\Client\User\Persistence\Entity\User;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Relation\BelongsTo;

/**
 * @Entity(
 *     table = "address"
 * )
 */
class Address
{
    /**
     * @Column(type="primary")
     * @var int
     */
    protected $address_id;

    /**
     * @BelongsTo(target = "user",   nullable =false)
     */
    protected $user;

    /**
     * @Column(type="string",nullable = false)
     * @var string
     */
    protected $country;

    /**
     * @Column( type="string", nullable=false)
     * @var string
     */
    protected $street;

    /**
     * @Column(type="string", nullable=false)
     * @var string
     */
    protected $town;

    /**
     * @Column(type="int", nullable=false)
     * @var int
     */
    protected $postCode;

    /**
     * @Column(type="string", nullable=false)
     * @var string
     */
    protected $type;

    /**
     * @Column(type="boolean", nullable=false)
     * @var bool
     */

    /**
     * @Column(type="string")
     * @var string
     */
    protected $firstName;

    /**
     * @return string
     */
    public function getFirstName(): string
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName(string $firstName): void
    {
        $this->firstName = $firstName;
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
     */
    public function setLastName(string $lastName): void
    {
        $this->lastName = $lastName;
    }

    /**
     * @Column(type="string")
     * @var string
     */
    protected $lastName;

    protected $active;

    /**
     * @return bool
     */

    public function getActive(): bool
    {
        return (bool) $this->active;
    }

    /**
     * @param bool $active
     */
    public function setActive($active): void
    {
        $this->active = $active;
    }

    /**
     * @return int
     */
    public function getAddressId(): int
    {
        return $this->address_id;
    }

    /**
     * @param int $address_id
     */
    public function setAddressId(int $address_id): void
    {
        $this->address_id = $address_id;
    }

    /**
     * @return User
     */
    public function getUser(): User
    {
        return $this->user;
    }

    /**
     * @param User $user
     */
    public function setUser(User $user): void
    {
        $this->user = $user;
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
     */
    public function setCountry(string $country): void
    {
        $this->country = $country;
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
     */
    public function setStreet(string $street): void
    {
        $this->street = $street;
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
     */
    public function setTown(string $town): void
    {
        $this->town = $town;
    }

    /**
     * @return int
     */
    public function getPostCode(): int
    {
        return $this->postCode;
    }

    /**
     * @param int $postCode
     */
    public function setPostCode(int $postCode): void
    {
        $this->postCode = $postCode;
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
     */
    public function setType(string $type): void
    {
        $this->type = $type;
    }



}
