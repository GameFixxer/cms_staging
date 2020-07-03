<?php
declare(strict_types=1);

namespace App\Import\Update;

use App\Model\Dto\CsvDataTransferObject;
use App\Service\Container;

class ProductImporter implements UpdateInterface
{
    /**
     * @var array ProductInterface
     */

    private array $importArrayList;
    private Container $container;

    public function __construct(array $importActionLIst, Container $container)
    {
        $this->importArrayList = $importActionLIst;
        $this->container = $container;
    }

    public function performUpdateActions(CsvDataTransferObject $csvDTO):void
    {
        foreach ($this->importArrayList as $action) {

            if (
                ["App\Import\Update\ProductInterface" => "App\Import\Update\ProductInterface"]!== class_implements($action)) {
                throw new \Exception('Filter or Updatefunction'.$action .'Broken', 1);
            }
            try {
                $actionclass = new $action($this->container);
                $actionclass->update($csvDTO);
            } catch (\Exception $e) {
                throw new \Exception($action.'Crashed', 1);
            }
        }
    }
}
