<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cycle\Annotated\Annotation\Entity;
use Cycle\Annotated\Annotation\Column;

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
    protected $categoryId;

    /**
     * @Column(type="string")
     * @var string
     */
    protected $categoryKey;

    /**
     * @param int $categoryId
     */
    public function setId(int $categoryId):void
    {
        $this->categoryId = $categoryId;
    }

    /**
     * @return int
     */
    public function getId(): int
    {
        return $this->categoryId;
    }
    /**
     * @return string
     */
    public function getKey(): string
    {
        return $this->categoryKey;
    }

    /**
     * @param string $categoryKey
     */

    public function setKey(string $categoryKey): void
    {
        $this->categoryKey = $categoryKey;
    }

}
