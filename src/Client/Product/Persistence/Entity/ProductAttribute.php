<?php
declare(strict_types=1);

namespace App\Client\Product\Persistence\Entity;

use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Column;

/**
 * @Entity(
 *     table = "productAttribute"
 * )
 */
class ProductAttribute
{
    /** @Column(type="primary") */
    private $id;

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
}
