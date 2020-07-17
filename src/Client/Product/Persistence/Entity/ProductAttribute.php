<?php
declare(strict_types=1);

namespace App\Client\Product\Persistence\Entity;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Relation\BelongsTo;

use Cycle\Annotated\Annotation\Relation\ManyToMany;
use Cycle\ORM\Relation\Pivoted\PivotedCollection;
/**
 * @Entity(
 *     table = "ProductAttribute"
 * )
 */
class ProductAttribute
{
/** @Column(type="primary") */
private $id;
}

