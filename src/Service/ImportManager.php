<?php
declare(strict_types=1);
namespace App\Service;

use App\Model\Dto\ProductDataTransferObject;
use App\Model\ProductRepository;

class ImportManager
{
    private ProductRepository $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;

    }

    public function checkForCreateOrUpdate(array $productList): ?array
    {
        $updatedProductList = array();
        foreach ($productList as $product) {
            $productFromRepository = $this->productRepository->getProduct($product->getArticleNumber());
            if ($productFromRepository instanceof ProductDataTransferObject && !$this->checkForSameValues($productFromRepository, $product)) {
                $updatedProductList[] = $product;
            } elseif ($product instanceof ProductDataTransferObject && $productFromRepository === null) {
                $updatedProductList[] = $product;
            }
        }
        return $updatedProductList;
    }

    private function checkForSameValues(ProductDataTransferObject $productFromRepository, ProductDataTransferObject $product):bool
    {
        if (
            $productFromRepository->getProductName() === $product->getProductName() &&
            $productFromRepository->getProductDescription() === $product->getProductDescription()) {
            return true;
        }
        return false;
    }
}
