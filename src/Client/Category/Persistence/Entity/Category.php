<?php
declare(strict_types=1);

namespace App\Client\Category\Persistence\Entity;

use App\Model\Entity\EntityInterface;
use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Column;
use Cycle\Annotated\Annotation\Relation\HasMany;

/**
 * @Entity(
 *     table = "category"
 * )
 */
class Category implements EntityInterface
{
    public const TABLE = 'category';
    /**
     * @Column(type="primary")
     * @var int
     */
    protected $category_id;

    /**
     * @Column( unique = "true", type="string")
     * @var string
     */
    protected $categoryKey;

    /**
     * @param int $category_id
     */
    public function setCategoryId(int $category_id):void
    {
        $this->category_id = $category_id;
    }

    /**
     * @return int
     */
    public function getCategoryId(): int
    {
        return $this->category_id;
    }
    /**
     * @return string
     */
    public function getCategoryKey(): string
    {
        return $this->categoryKey;
    }

    /**
     * @param string $categoryKey
     */

    public function setCategoryKey(string $categoryKey): void
    {
        $this->categoryKey = $categoryKey;
    }

}
