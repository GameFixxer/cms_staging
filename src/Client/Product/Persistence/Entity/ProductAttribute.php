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
}
