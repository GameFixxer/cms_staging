<?php

declare(strict_types=1);
namespace App\Generated\Dto;

use App\Client\User\Persistence\Entity\User;

class AddressDataTransferObject
{
    protected int $address_id = 0;

    protected User $user;

    protected string $country = "";

    protected string $street = "";

    protected string $town = "";

    protected int $postCode = 0;

    protected string $type = "";

    protected bool $active = false;


    public function getActive(): bool
    {
        return $this->active;
    }

    public function setActive(bool $active): void
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
