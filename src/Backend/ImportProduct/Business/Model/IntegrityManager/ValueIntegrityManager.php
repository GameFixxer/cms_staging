<?php
declare(strict_types=1);
namespace App\Backend\ImportProduct\Business\Model\IntegrityManager;

use App\Client\Category\Persistence\Entity\Category;
use App\Client\Product\Business\ProductBusinessFacadeInterface;
use App\Generated\Dto\CategoryDataTransferObject;
use App\Generated\Dto\CsvProductDataTransferObject;
use App\Generated\Dto\DataTransferObjectInterface;
use App\Generated\Dto\ProductDataTransferObject;

class ValueIntegrityManager implements ValueIntegrityManagerInterface
{
    private ProductBusinessFacadeInterface $productBusinessFacade;

    public function __construct(ProductBusinessFacadeInterface $productBusinessFacade)
    {
        $this->productBusinessFacade = $productBusinessFacade;
    }

    public function checkValuesChanged(CsvProductDataTransferObject $csvDTO, DataTransferObjectInterface $dto):bool
    {
        foreach (get_class_methods($dto) as $action) {
            $getter = ''.$action;
            if (str_starts_with($getter, 'get')) {
                if ($csvDTO->$getter() !== $dto->$getter()) {
                    return true;
                }
            }
        }
        return false;
    }

    public function checkObjectValueChanged(CsvProductDataTransferObject $csvDTO, CategoryDataTransferObject $categoryDTO):bool
    {
        $productCategory = $this->productBusinessFacade->get($csvDTO->getArticleNumber())->getCategory();
        if (!$productCategory instanceof Category) {
            return true;
        }
        if ($productCategory->getCategoryKey() !== $categoryDTO->getCategoryKey() || $productCategory->getCategoryId() !== $categoryDTO->getCategoryId()) {
            return true;
        }
        return false;
    }
}
