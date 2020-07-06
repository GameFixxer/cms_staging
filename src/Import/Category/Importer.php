<?php
declare(strict_types=1);

namespace App\Import\Category;

use App\Import\Category\Create\CategoryInterface;
use App\Import\CsvImportLoaderInterface;
use App\Import\Category\Update\CategoryUpdateInterface;
use App\Model\Dto\CsvDataTransferObject;

class Importer
{
    private CsvImportLoaderInterface $csvLoader;
    private CategoryInterface $createCategory;
    private CategoryUpdateInterface $updateImport;
    private string $path;

    public function __construct(
        CsvImportLoaderInterface $csvLoader,
        CategoryInterface $category,
        CategoryUpdateInterface $updateImport,
        string $path
    )
    {
        $this->csvLoader = $csvLoader;
        $this->path = $path;
        $this->updateImport = $updateImport;
        $this->createCategory = $category;
    }

    public function import(): void
    {
        $rawCategoryList = $this->csvLoader->mapCSVToDTO($this->path);
        if (isset($rawCategoryList)) {
            foreach ($rawCategoryList as $object) {
                $updatedDTO = $this->createCategory->createCategory($object);
                if ($updatedDTO instanceof CsvDataTransferObject) {
                    $this->updateImport->performUpdateActions($updatedDTO);
                }
            }
        }
    }
}
