<?php
declare(strict_types=1);

namespace App\Client\Product\Business;

use App\Client\Product\Persistence\ProductEntityManagerInterface;
use App\Client\Product\Persistence\ProductRepositoryInterface;
use App\Generated\ProductDataProvider;

class ProductBusinessFacade implements ProductBusinessFacadeInterface
{
    private ProductRepositoryInterface $productRepository;
    private ProductEntityManagerInterface $productEntityManager;

    public function __construct(ProductRepositoryInterface $productRepository, ProductEntityManagerInterface $productEntityManager)
    {
        $this->productRepository = $productRepository;
        $this->productEntityManager = $productEntityManager;
    }

    public function get(string $articleNumber): ?ProductDataProvider
    {
        return $this->productRepository->get($articleNumber);
    }

    /**
     * @return ProductDataProvider[]
     */

    public function getList():array
    {
        return$this->productRepository->getList();
    }
    public function save(ProductDataProvider $product):ProductDataProvider
    {
        return $this->productEntityManager->save($product);
    }
    public function delete(ProductDataProvider $product)
    {
        $this->productEntityManager->delete($product);
    }
}
