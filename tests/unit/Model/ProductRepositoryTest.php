<?php

use App\Model\ProductRepository;

class ProductRepositoryTest extends \Codeception\Test\Unit
{

    public function testGetProductList()
    {
        $db = new \App\Service\DatabaseManager();
        $productrepository = new ProductRepository($db->connect());
        $productrepository->getProductList();
    }

    public function testGetProduct()
    {
    }

    public function testHasProduct()
    {
        $db = new \App\Service\DatabaseManager();
        $productrepository = new ProductRepository($db->connect());
        self::assertFalse($productrepository->hasProduct(0));
    }

    public function test__construct()
    {
    }
}
