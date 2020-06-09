<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Entity\Product;
use App\Model\Mapper\ProductMapper;
use App\Model\Dto\ProductDataTransferObject;
use Cycle\ORM\ORM;

class ProductRepository
{
    private ProductMapper $productMapper;
    private \Cycle\ORM\RepositoryInterface $ormProductRepository;

    public function __construct(ORM $orm)
    {
        $this->productMapper = new ProductMapper();
        $this->ormProductRepository = $orm->getRepository(Product::class);
    }

    /**
     * @return ProductDataTransferObject[]
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

    public function getProduct(int $id): ?ProductDataTransferObject
    {
        $productEntity = $this->ormProductRepository->findByPK($id);
        if ($productEntity instanceof Product) {
            return $this->productMapper->map($productEntity);
        }
        return null;
    }
}
