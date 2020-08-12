<?php

declare(strict_types=1);

namespace App\Client\Product\Persistence;


use App\Client\Product\Persistence\Entity\Product;
use App\Client\Product\Persistence\Mapper\ProductMapperInterface;
use App\Generated\ProductDataProvider;
use Cycle\ORM\ORM;

class ProductRepository implements ProductRepositoryInterface
{
    private ProductMapperInterface $productMapper;
    private \Cycle\ORM\RepositoryInterface $ormProductRepository;

    /**
     * ProductRepository constructor.
     * @param ProductMapperInterface $productMapper
     * @param \Cycle\ORM\ORM $ormProductRepository
     */
    public function __construct(ProductMapperInterface $productMapper, \Cycle\ORM\ORM $ormProductRepository)
    {
        $this->productMapper = $productMapper;
        $this->ormProductRepository = $ormProductRepository->getRepository(Product::class);
    }


    /**
     * @return ProductDataProvider[]
     */
    public function getProductList(): array
    {
        $productList = [];
        $productEntityList = (array)$this->ormProductRepository->select()->fetchALl();
        /** @var  Product $product */
        foreach ($productEntityList as $product) {
            $productList[] = $this->productMapper->map($product);
        }
        return $productList;
    }

    public function getProduct(string $articleNumber): ?ProductDataProvider
    {
        $productEntity = $this->ormProductRepository->findOne(['article_Number'=>$articleNumber]);
        if ($productEntity instanceof Product) {
            return $this->productMapper->map($productEntity);
        }
        return null;
    }
}
