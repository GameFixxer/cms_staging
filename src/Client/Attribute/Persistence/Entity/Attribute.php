<?php


namespace App\Client\Attribute\Persistence\Entity;

use Doctrine\ORM\Mapping\Column;
use Doctrine\ORM\Mapping\Entity;
use Doctrine\ORM\Mapping\GeneratedValue;
use Doctrine\ORM\Mapping\Id;

/**@Entity  */
class Attribute
{
    /**
     * @Id
     * @Column(type="integer")
     * @GeneratedValue
     */
    protected $id;
    /** @Column(type="string") */
    protected $attribute_key;
    /** @Column(type="string") */
    protected $attribute_value;

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
    public function getAttributeKey()
    {
        return $this->attribute_key;
    }

    /**
     * @param mixed $attribute_key
     */
    public function setAttributeKey($attribute_key): void
    {
        $this->attribute_key = $attribute_key;
    }

    /**
     * @return mixed
     */
    public function getAttributeValue()
    {
        return $this->attribute_value;
    }

    /**
     * @param mixed $attribute_value
     */
    public function setAttributeValue($attribute_value): void
    {
        $this->attribute_value = $attribute_value;
    }

}
