<?php

namespace App\Model;

use App\Model\Dto\ProductDataTransferObject;
use App\Service\Container;
use App\Service\SQLConnector;

class ProductEntityManager
{
    private SQLConnector $connector;
    /**
     * @var ProductRepository
     */
    private ProductRepository $productRepository;


    public function __construct(SQLConnector $connector, ProductRepository $productRepository)
    {
        $this->connector = $connector;
        $this->productRepository = $productRepository;
    }



    public function delete(ProductDataTransferObject $product):void
    {
        $data = array();
        $data [] = $product->getProductId();
        $this->connector->set('Delete from product where id= ?', $this->encodeArray($data), $data);
        $this->productRepository->getProductList();
    }

    public function save(ProductDataTransferObject $product): void
    {
        $data = array();
        if (!($product->getProductId() === 0)) {
            $data[] = $product->getProductName();
            $data[] = $product->getProductDescription();
            $data[] = (int)$product->getProductId();
            $this->connector->set('Update product set name=(?),description=(?) where id= ?', $this->encodeArray($data), $data);
        } else {
            $data[] = $product->getProductName();
            $data[] = $product->getProductDescription();
            $this->connector->set('INSERT INTO product (name, description) values(?,?)', $this->encodeArray($data), $data);
        }
        $this->productRepository->getProductList();
    }
    private function encodeArray(array $params): string
    {
        $tmp = '';
        foreach ($params as $key) {
            switch ($key) {
            case is_int($key):
                $tmp .= 'i';
                break;
            case is_string($key):
                $tmp .= 's';
                break;
            case is_float($key):
                $tmp .= 'd';
                break;
        }
        }
        return $tmp;
    }
}
