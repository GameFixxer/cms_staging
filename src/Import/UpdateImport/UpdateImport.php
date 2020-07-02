<?php
declare(strict_types=1);

namespace App\Import\UpdateImport;

use App\Model\Dto\CsvDataTransferObject;

class UpdateImport implements UpdateImportInterface
{
    private UpdateProductCategoryInterface $updateProductCategory;
    private UpdateProductInformationInterface $updateProductInformation;

    public function __construct(UpdateProductCategoryInterface $updateProductCategory, UpdateProductInformationInterface $updateProductInformation)
    {
        $this->updateProductCategory = $updateProductCategory;
        $this->updateProductInformation = $updateProductInformation;
    }

    public function updateProducts(CsvDataTransferObject $csvDTO)
    {

        try {
            $updatedCsvDTO = $this->updateProductCategory->updateProductCategory($csvDTO);
            $this->updateProductInformation->updateProductInformation($updatedCsvDTO);
        } catch (\Exception $e) {
            //TODO
        }
    }
}
