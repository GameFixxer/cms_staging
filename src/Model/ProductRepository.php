<?php

declare(strict_types=1);

namespace App\Model;

use App\Service\SQLConnector;
use App\Model\Mapper\ProductMapper;
use App\Model\Dto\ProductDataTransferObject;

class ProductRepository
{
    private array $productList;
    private SQLConnector $connect;
    private ProductMapper $productmapper;

    public function __construct(SQLConnector $connector)
    {
        $this->connect = $connector;
        $this->productmapper = new ProductMapper();
        $this->getFromDB('product');
    }

    private function getFromDB(string $data): void
    {
        $tmp = [];
        $this->productList = [];
        if ($this->connect->connect2('root', 'pass123')) {
            $array = $this->makeArrayResult($this->connect->get('Select * from '.$data, '', $tmp));
            if (!empty($array)) {
                foreach ($array as $product) {
                    $this->productList[(int)$product['id']] = $this->productmapper->map($product);
                }
            } else {
                echo('Database is empty...');
            }
        } else {
            echo('Could not establish Connection with Database');
        }
    }

    private function makeArrayResult(object $resultobj): array
    {
        if ($resultobj->num_rows === 0) {
            return array();
        } else {
            $array = array();
            while ($line = $resultobj->fetch_array()) {
                $array[] = $line;
            }

            return $array;
        }
    }

    /**
     * @return ProductDataTransferObject[]
     */
    public function getProductList(): array
    {
        $this->getFromDB('product');

        return $this->productList;
    }

    public function getProduct(int $id): ProductDataTransferObject
    {
        if (!$this->hasProduct($id)) {
            throw new \Exception('Error! Productid is ivalid.', 1);
            {
            }
        }

        return $this->productList[$id];
    }

    public function hasProduct(int $id): bool
    {
        return isset($this->productList[$id]);
    }

    public function authenticate(string $username, string $password): bool
    {
        return $this->connect->connect2($username, $password);
    }

}
