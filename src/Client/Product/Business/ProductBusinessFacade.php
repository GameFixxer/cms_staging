<?php
declare(strict_types=1);

namespace App\Client\Product\Business;

use App\Client\Product\Persistence\ProductEntityManagerInterface;
use App\Client\Product\Persistence\ProductRepositoryInterface;
use App\Generated\Dto\ProductDataTransferObject;

class ProductBusinessFacade implements ProductBusinessFacadeInterface
{
    private ProductRepositoryInterface $productRepository;
    private ProductEntityManagerInterface $productEntityManager;

    public function __construct(ProductRepositoryInterface $productRepository, ProductEntityManagerInterface $productEntityManager)
    {
        $this->productRepository = $productRepository;
        $this->productEntityManager = $productEntityManager;
    }

    public function get(string $articleNumber): ?ProductDataTransferObject
    {
        return $this->productRepository->getProduct($articleNumber);
    }

    /**
     * @return ProductDataTransferObject[]
     */

    public function getList():array
    {
        return$this->productRepository->getProductList();
    }
    public function save(ProductDataTransferObject $product):ProductDataTransferObject
    {
        return $this->productEntityManager->save($product);
    }
    public function delete(ProductDataTransferObject $product)
    {
        $this->productEntityManager->delete($product);
    }
}
