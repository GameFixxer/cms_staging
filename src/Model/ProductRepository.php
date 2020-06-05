<?php

declare(strict_types=1);

namespace App\Model;

use App\Model\Entity\Product;
use App\Service\SQLConnector;
use App\Model\Mapper\ProductMapper;
use App\Model\Dto\ProductDataTransferObject;
use Cycle\ORM\ORM;
use phpDocumentor\Reflection\Types\This;

class ProductRepository
{
    private array $productList;
    private SQLConnector $connector;
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
        $this->productList = [];

        $array = $this->ormProductRepository->select()->fetchALl();
        foreach ($array as $product) {
            $this->productList[(int) $product->getId()] = $this->productMapper->map($product);
        }
        return $this->productList;
    }

    public function getProduct(int $id): ProductDataTransferObject
    {
        if (!$this->hasProduct($id)) {
            throw new \Exception('Error! Productid is ivalid.', 1);
        }
        return $this->productMapper->map($this->productList[$id]);
    }

    public function hasProduct(int $id): bool
    {
        if (!isset($this->productList[$id])) {
            $productEntity = $this->ormProductRepository->findByPK($id);
            $this->productList[$id]=$productEntity;
        }
        return $this->productList[$id] instanceof Product;
    }

}
