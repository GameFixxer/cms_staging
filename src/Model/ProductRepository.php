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

    public function __construct(SQLConnector $connector)
    {

        $array = $this->makeArrayResult($this->setList($connector, 'product'));
        $productMapper = new ProductMapper();
        foreach ($array as $product) {
            $this->list[(int)$product['id']] = $productMapper->map($product);
        }
    }

    /**
     * @return ProductDataTransferObject[]
     */
    public function getList(): array
    {
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

    private function makeArrayResult($resultobj)
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

    public function setList(SQLConnector $connector, string $data)
    {
        $this->connect = $connector;
        $tmp = Array();
        return $this->connect->get('Select * from ' . $data, '', $tmp);
    }
}