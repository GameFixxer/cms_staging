<?php
declare(strict_types=1);

namespace App\Backend\ImportAttribute\Business\Model\Update;

use Exception;
use App\Backend\ImportProduct\Business\Model\ActionProvider;
use App\Generated\Dto\CsvAttributeDataTransferObject;

class AttributeImporter implements AttributeImporterInterface
{
    /**
     * @var \App\Backend\ImportProduct\Business\Model\ActionProvider
     */
    private ActionProvider $filterProvider;

    /**
     * @param \App\Backend\ImportProduct\Business\Model\ActionProvider $filterProvider
     */
    public function __construct(ActionProvider $filterProvider)
    {
        $this->filterProvider = $filterProvider;
    }

    /**
     * @param \App\Generated\Dto\CsvAttributeDataTransferObject $csvDTO
     *
     * @return void
     * @throws \Exception
     */
    public function performUpdateActions(CsvAttributeDataTransferObject $csvDTO): void
    {
        foreach ($this->filterProvider->getAttributeActionList() as $action) {
            if ($action === null) {
                throw new Exception('Filter or Updatefunction broken (action = null)', 1);
            }

            try {
                $action->update($csvDTO);
            } catch (Exception $e) {
                throw new Exception(get_class($action) . ' crashed', 1);
            }
        }
    }
}
