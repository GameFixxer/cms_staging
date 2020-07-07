<?php


namespace App\Backend\ImportProduct\Business\Model\Update;

use App\Backend\ImportProduct\Business\Model\IntegrityManager\ValueIntegrityManager;
use App\Model\Dto\CsvDataTransferObject;
use App\Model\Dto\ProductDataTransferObject;
use App\Model\ProductEntityManager;
use App\Model\ProductRepository;
use App\Service\Container;

class ProductInformation implements ProductInterface
{
    private ProductRepository $productRepository;
    private ProductEntityManager $productEntityManager;
    private ValueIntegrityManager $valueIntegrityManager;

    public function __construct(
        ProductRepository $productRepository,
        ProductEntityManager $productEntityManager,
        ValueIntegrityManager $valueIntegrityManager
    ) {
        $this->productRepository = $productRepository;
        $this->productEntityManager = $productEntityManager;
        $this->valueIntegrityManager = $valueIntegrityManager;
    }

    public function update(CsvDataTransferObject $csvDTO):void
    {
        if ($csvDTO->getProductName() === '' || $csvDTO->getProductDescription() === '') {
            throw new \Exception('Name and Description must not be empty', 1);
        }
        $productDTO = $this->productRepository->getProduct($csvDTO->getArticleNumber());
        if (!$productDTO instanceof ProductDataTransferObject) {
            throw new \Exception('ProductDTO empty', 1);
        }
        if ($this->valueIntegrityManager->checkValuesChanged($csvDTO, $productDTO)) {
            $productDTO->setProductName($csvDTO->getProductName());
            $productDTO->setProductDescription($csvDTO->getProductDescription());
            $this->productEntityManager->save($productDTO);
        }
    }
}
