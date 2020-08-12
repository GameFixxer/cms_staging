<?php
declare(strict_types=1);

namespace App\Backend\ImportCategory\Business\Model\Update;

use App\Backend\ImportComponent\ImportFilterProvider;
use App\Backend\ImportProduct\Business\Model\ActionProvider;
use App\Generated\CsvCategoryDataProvider;

class CategoryImporter implements CategoryUpdateInterface
{
    /**
     * @var array ProductInterface
     */

    private array $importArrayList;

    public function __construct(ActionProvider $filterProvider)
    {
        $this->importArrayList = $filterProvider->getCategoryActionList();
    }

    public function performUpdateActions(CsvCategoryDataProvider $csvDTO):void
    {
        foreach ($this->importArrayList as $action) {
            if ($action === null) {
                throw new \Exception('Filter or Updatefunction'.get_class($action).'Broken', 1);
            }
            try {
                $action->update($csvDTO);
            } catch (\Exception $e) {
                throw new \Exception(get_class($action).'Crashed', 1);
            }
        }
    }
}
