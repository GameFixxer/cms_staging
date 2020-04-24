<?php
declare(strict_types=1);

namespace App\Model;
use App\Service\SQLConnector;
use App\Model\Mapper\ProductMapper;
use App\Model\Dto\ProductDataTransferObject;

class ProductRepository
{
    private array $list;
    private SQLConnector $connect;

    public function __construct(SQLConnector $connector)
    {
        $this->connect = $connector;
        $array = $this->connect->findAll('product');
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

}