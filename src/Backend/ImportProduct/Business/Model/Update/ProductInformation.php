<?php
declare(strict_types=1);

namespace App\Backend\ImportProduct\Business\Model\Update;

use App\Backend\ImportProduct\Business\Model\IntegrityManager\ValueIntegrityManager;
use App\Client\Product\Business\ProductBusinessFacadeInterface;
use App\Generated\CsvProductDataProvider;
use App\Generated\ProductDataProvider;


class ProductInformation implements ProductInterface
{
    private ProductBusinessFacadeInterface  $productBusinessFacade;
    private ValueIntegrityManager $valueIntegrityManager;

    public function __construct(
        ProductBusinessFacadeInterface $productBusinessFacade,
        ValueIntegrityManager $valueIntegrityManager
    ) {
        $this->productBusinessFacade = $productBusinessFacade;
        $this->valueIntegrityManager = $valueIntegrityManager;
    }

    public function update(CsvProductDataProvider $csvDTO):void
    {
        if ($csvDTO->getName() === '' || $csvDTO->getDescription() === '') {
            throw new \Exception('Name and Description must not be empty', 1);
        }
        $productDTO = $this-> productBusinessFacade->get($csvDTO->getArticleNumber());
        if (!$productDTO instanceof ProductDataProvider) {
            throw new \Exception('ProductDTO empty', 1);
        }
        if ($this->valueIntegrityManager->checkValuesChanged($csvDTO, $productDTO)) {
            $productDTO->setName($csvDTO->getName());
            $productDTO->setDescription($csvDTO->getDescription());
            $this->productBusinessFacade->save($productDTO);
        }
    }
}
