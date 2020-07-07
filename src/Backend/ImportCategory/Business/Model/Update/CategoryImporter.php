<?php
declare(strict_types=1);

namespace App\Backend\ImportCategory\Business\Model\Update;

use App\Model\Dto\CsvDataTransferObject;
use App\Service\Container;

class CategoryImporter implements CategoryUpdateInterface
{
    /**
     * @var array ProductInterface
     */

    private array $importArrayList;
    private Container $container;

    public function __construct(array $importActionLIst)
    {
        $this->importArrayList = $importActionLIst;
    }

    public function performUpdateActions(CsvDataTransferObject $csvDTO):void
    {
        foreach ($this->importArrayList as $action) {

            if (! $action instanceof  CategoryUpdateInterface) {
                throw new \Exception('Filter or Updatefunction'.$action.'Broken', 1);
            }
            try {
                $action->update($csvDTO);
            } catch (\Exception $e) {
                throw new \Exception($action.'Crashed', 1);
            }
        }
    }
}
