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
        //$this->connector = $connector;
        $this->productMapper = new ProductMapper();
        $this->ormProductRepository = $orm->getRepository(Product::class);
        dump($this->ormProductRepository);
    }

    /**
     * @return ProductDataTransferObject[]
     */
    public function getProductList(): array
    {
        $this->productList = [];

        $array = $this->makeArrayResult($this->connector->get('Select * from product', '', []));

        foreach ($array as $product) {
            $this->productList[(int)$product['id']] = $this->productMapper->map($product);
        }

        return $this->productList;
    }

    public function getProduct(int $id): ProductDataTransferObject
    {
        if (!$this->hasProduct($id)) {
            throw new \Exception('Error! Productid is ivalid.', 1);
        }

        return $this->hasProduct($id);
    }

    public function hasProduct(int $id): bool
    {
        if (!isset($this->productList[$id])) {
            dump($id);
            $productEntity = $this->ormProductRepository->findByPK($id);
            dump($productEntity);
            $this->productList[$id]=$productEntity;
        }

        return $this->productList[$id] instanceof Product;
    }
    private function makeArrayResult(object $resultobj): array
    {
        $result = [];
        if ($resultobj->num_rows > 0) {
            while ($line = $resultobj->fetch_array()) {
                $result[] = $line;
            }
        }

        return $result;
    }
}
