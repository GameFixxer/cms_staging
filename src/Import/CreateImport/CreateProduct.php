<?php
declare(strict_types=1);

namespace App\Import\CreateImport;

use App\Model\Dto\CsvDataTransferObject;
use App\Model\Dto\ProductDataTransferObject;
use App\Model\Entity\Category;
use App\Model\Entity\Product;
use App\Model\ProductEntityManagerInterface;
use App\Model\ProductRepositoryInterface;

class CreateProduct
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
                //$csvDTO->setProduct($this->mapEntity($csvDTO));
                return $csvDTO;
            }
            $productDTO = new ProductDataTransferObject();
            $productDTO->setArticleNumber($csvDTO->getArticleNumber());
            $csvDTO->setProductId($this->productEntityManager->save($productDTO)->getProductId());
            //$csvDTO->setProduct($this->mapEntity($csvDTO));
            //$this->productEntityManager->save($productDTO);
            return $csvDTO;
        }
        return null;

    }

    private function mapEntity(CsvDataTransferObject $csvDTO)
    {
        $productEntity = new Product();
        $productEntity->setCategory($csvDTO->getProductId());

        return $productEntity;
    }
}
