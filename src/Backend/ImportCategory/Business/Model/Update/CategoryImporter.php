<?php
declare(strict_types=1);

namespace App\Backend\ImportCategory\Business\Model\Update;

use App\Generated\Dto\CsvCategoryDataTransferObject;

class CategoryImporter implements CategoryUpdateInterface
{
    /**
     * @var array ProductInterface
     */

    private array $importArrayList;

    public function __construct(array $importActionLIst)
    {
        $this->importArrayList = $importActionLIst;
    }

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
