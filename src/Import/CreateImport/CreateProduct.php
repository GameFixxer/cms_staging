<?php
declare(strict_types=1);

namespace App\Import\CreateImport;

use App\Model\Dto\CsvDataTransferObject;
use App\Model\Dto\ProductDataTransferObject;
use App\Model\Entity\Product;
use App\Model\ProductEntityManagerInterface;
use App\Model\ProductRepositoryInterface;

class CreateProduct implements CreateProductInterface
{
    private ProductRepositoryInterface $productRepository;
    private ProductEntityManagerInterface $productEntityManager;

    public function __construct(ProductRepositoryInterface $productRepository, ProductEntityManagerInterface $productEntityManager)
    {
        $this->productRepository = $productRepository;
        $this->productEntityManager = $productEntityManager;
    }

    public function createProduct(CsvDataTransferObject $csvDTO) :?CsvDataTransferObject
    {
        if ($csvDTO->getArticleNumber() !== '') {
            $productFromRepo = $this->productRepository->getProduct($csvDTO->getArticleNumber());
            if ($productFromRepo instanceof ProductDataTransferObject) {
                $csvDTO->setProductId($productFromRepo->getProductId());
                return $csvDTO;
            }
            $productDTO = new ProductDataTransferObject();
            $productDTO->setArticleNumber($csvDTO->getArticleNumber());
            $csvDTO->setProductId($this->productEntityManager->save($productDTO)->getProductId());
            return $csvDTO;
        }
        return null;

    }
}
