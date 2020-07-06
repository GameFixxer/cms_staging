<?php
declare(strict_types=1);

namespace App\Import\Create;

use App\Model\Dto\CsvDataTransferObject;
use App\Model\Dto\ProductDataTransferObject;
use App\Model\Entity\Product as ProductEntity;
use App\Model\ProductEntityManagerInterface;
use App\Model\ProductRepositoryInterface;

class Product implements ProductInterface
{
    private ProductRepositoryInterface $productRepository;
    private ProductEntityManagerInterface $productEntityManager;

    public function __construct(ProductRepositoryInterface $productRepository, ProductEntityManagerInterface $productEntityManager)
    {
        $this->productRepository = $productRepository;
        $this->productEntityManager = $productEntityManager;
    }

    public function createProduct(CsvDataTransferObject $csvDTO) : ?CsvDataTransferObject
    {
        if ($csvDTO->getArticleNumber() === '') {
            throw new \Exception('ArticleNumber must not be empty', 1);
        }

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
}