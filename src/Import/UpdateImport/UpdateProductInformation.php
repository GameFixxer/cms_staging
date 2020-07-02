<?php


namespace App\Import\UpdateImport;

use App\Model\Dto\CsvDataTransferObject;
use App\Model\Dto\ProductDataTransferObject;
use App\Model\ProductEntityManagerInterface;
use App\Model\ProductRepositoryInterface;

class UpdateProductInformation implements UpdateProductInformationInterface
{
    private ProductRepositoryInterface $productRepository;
    private ProductEntityManagerInterface $productEntityManager;

    public function __construct(ProductRepositoryInterface $productRepository, ProductEntityManagerInterface $productEntityManager)
    {
        $this->productRepository = $productRepository;
        $this->productEntityManager = $productEntityManager;
    }

    public function updateProductInformation(CsvDataTransferObject $csvDTO):void
    {
        if ($csvDTO->getProductName() === '' || $csvDTO->getProductDescription() === '') {
            throw new \Exception('Name and Description must not be empty', 1);
        } else {
            $productDTO = $this->productRepository->getProduct($csvDTO->getArticleNumber());
            if ($productDTO instanceof ProductDataTransferObject) {
                $productDTO->setProductName($csvDTO->getProductName());
                $productDTO->setProductDescription($csvDTO->getProductDescription());
                $this->productEntityManager->save($productDTO);
            }
        }
    }
}
