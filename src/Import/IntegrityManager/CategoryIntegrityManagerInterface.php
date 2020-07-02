<?php

namespace App\Import\IntegrityManager;

use App\Model\Dto\CsvDataTransferObject;
use App\Model\Entity\Product;

interface CategoryIntegrityManagerInterface
{
    public function mapEntity(CsvDataTransferObject $csvDTO): ?object ;
    public function updateProductInCategory(CsvDataTransferObject $csvDTO):Product;
    public function updateCategoryInProduct(CsvDataTransferObject $csvDTO): Product;
}
