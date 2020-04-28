<?php
declare(strict_types=1);

namespace App\Model;

use App\Service\SQLConnector;
use App\Model\Mapper\ProductMapper;
use App\Model\Dto\ProductDataTransferObject;
use phpDocumentor\Reflection\Types\Array_;

class ProductRepository
{
    private array $list;
    private SQLConnector $connect;
    private ProductMapper $productmapper;

    public function __construct(SQLConnector $connector)
    {
        $this->connect = $connector;
        $this->productmapper = new ProductMapper();
        $this->initList('product');


    }

    /**
     * @return ProductDataTransferObject[]
     */
    public function getList(): array
    {
        $this->initList('product');
        return $this->list;
    }

    public function getProduct(int $id): ProductDataTransferObject
    {

        if (!$this->hasProduct($id)) {

            throw new \Exception('Error! Productid is ivalid.', 1);
            {
            }

        }
        return $this->list[$id];
    }

    public function hasProduct($id): bool
    {

        return isset($this->list[$id]);
    }

    private function makeArrayResult(object $resultobj)
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

    public function authenticate(string $username, string $password): bool
    {
        return $this->connect->connect($username, $password);
    }

    private function initList(string $data): void
    {
        $tmp = Array();
        if ($this->connect->connect('root', 'pass123')) {
            $array = $this->makeArrayResult($this->connect->get('Select * from ' . $data, '', $tmp));
            foreach ($array as $product) {
                $this->list[(int)$product['id']] = $this->productmapper->map($product);
            }
        } else {
            echo('Could not establish Connection with Database');
        }
    }

    public function set(string $sql, string $whitespace, array $data)
    {
        if ($this->connect->connect('root', 'pass123')) {
            $this->connect->set($sql, $whitespace, $data);
        } else {
            echo('Could not establish Connection with Database');
        }
    }


}