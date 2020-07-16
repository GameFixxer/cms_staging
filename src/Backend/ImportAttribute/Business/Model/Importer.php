<?php
declare(strict_types=1);

namespace App\Backend\ImportAttribute\Business\Model;

use App\Backend\ImportAttribute\Business\Model\Create\AttributeInterface;
use App\Backend\ImportAttribute\Business\Model\Update\AttributeImporterInterface;
use App\Backend\ImportComponent\Loader\CsvImportLoaderInterface;
use App\Generated\Dto\CsvAttributeDataTransferObject;

class Importer
{
    private CsvImportLoaderInterface $csvLoader;
    private AttributeInterface $attribute;
    private AttributeImporterInterface $attributeImporter;
    private string $path;

    public function __construct(
        CsvImportLoaderInterface $csvLoader,
        AttributeInterface $attribute,
        AttributeImporterInterface $attributeImporter,
        string $path
    ) {
        $this->csvLoader = $csvLoader;
        $this->path = $path;
        $this->attributeImporter = $attributeImporter;
        $this->attribute = $attribute;
    }

    public function import(): void
    {
        $rawCategoryList = $this->csvLoader->mapCSVToDTO($this->path);
        if (isset($rawCategoryList)) {
            foreach ($rawCategoryList as $object) {
                $updatedDTO = $this->attribute->createCategory($object);
                if ($updatedDTO instanceof CsvAttributeDataTransferObject) {
                    $this->attributeImporter->performUpdateActions($updatedDTO);
                }
            }
        }
    }
}
