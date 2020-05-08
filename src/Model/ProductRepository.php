<?php

declare(strict_types=1);

namespace App\Model;

use App\Service\SQLConnector;
use App\Model\Mapper\ProductMapper;
use App\Model\Dto\ProductDataTransferObject;

class ProductRepository
{
    private array $productList;
    private SQLConnector $connector;
    private ProductMapper $productMapper;

    public function __construct(SQLConnector $connector)
    {
        $this->connector = $connector;
        $this->productMapper = new ProductMapper();
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

        return $this->productList[$id];
    }

    public function hasProduct(int $id): bool
    {
        if (!isset($this->productList)) {
            $this->getProductList();
        }

        return isset($this->productList[$id]);
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
