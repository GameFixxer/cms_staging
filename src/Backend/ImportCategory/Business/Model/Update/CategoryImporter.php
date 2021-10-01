<?php
declare(strict_types=1);

namespace App\Backend\ImportCategory\Business\Model\Update;

use App\Backend\ImportComponent\ImportFilterProvider;
use App\Backend\ImportProduct\Business\Model\ActionProvider;
use App\Generated\Dto\CsvCategoryDataTransferObject;

class CategoryImporter implements CategoryUpdateInterface
{
    /**
     * @var array ProductInterface
     */

    private array $importArrayList;

    /**
     * @param \App\Backend\ImportProduct\Business\Model\ActionProvider $filterProvider
     */
    public function __construct(ActionProvider $filterProvider)
    {
        $this->importArrayList = $filterProvider->getCategoryActionList();
    }

    /**
     * @param \App\Generated\Dto\CsvCategoryDataTransferObject $csvDTO
     * @throws \Exception
     */
    public function performUpdateActions(CsvCategoryDataTransferObject $csvDTO):void
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
