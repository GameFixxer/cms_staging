<?php
declare(strict_types=1);

namespace App\Backend\ImportProduct\Business\Model\Update;

use App\Generated\Dto\CsvDataTransferObject;
use App\Generated\Dto\CsvProductDataTransferObject;

class ProductImporter implements UpdateInterface
{
    /**
     * @var array ProductInterface
     */

    private array $importArrayList;

    public function __construct(array $importActionLIst)
    {
        $this->importArrayList = $importActionLIst;
    }

    public function performUpdateActions(CsvProductDataTransferObject $csvDTO):void
    {
        foreach ($this->importArrayList as $action) {
            if (!$action instanceof ProductInterface) {
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
