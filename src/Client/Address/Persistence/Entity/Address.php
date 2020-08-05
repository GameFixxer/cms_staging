<?php


namespace App\Client\Address\Persistence\Entity;

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
     * @return string
     */
    public function getUser(): string
    {
        return $this->user;
    }

    /**
     * @param string $user
     */
    public function setUser(string $user): void
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
