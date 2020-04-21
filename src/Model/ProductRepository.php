<?php
declare(strict_types=1);

namespace App\Model;


use App\Model\Mapper\ProductMapper;

class ProductRepository
{
    private array $list;

    public function __construct()
    {

        $url = dirname(__DIR__, 2) . '/database/data.json';
        $data = file_get_contents($url);
        $array = json_decode($data, true);
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