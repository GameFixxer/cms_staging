<?php


namespace App\Import\Update;

use App\Import\IntegrityManager\ValueIntegrityManager;
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

    public function __construct(Container $container)
    {
        $this->productRepository = $container->get(ProductRepository::class);
        $this->productEntityManager = $container->get(ProductEntityManager::class);
        $this->valueIntegrityManager = $container->get(ValueIntegrityManager::class);
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
