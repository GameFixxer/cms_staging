<?php


namespace App\Tests\integration\Model;

/**
 * @group ProductEntityManagerTest
 */
class ProductEntityManagerTest extends \Codeception\Test\Unit
{
    public function testCreateProduct()
    {
        $helper = new Helper();

        $createdProduct = $helper->createProduct('fo', 'fu');
        $this->assertEquals($createdProduct, $helper->getProduct($createdProduct->getProductId()));

        $createdProduct = $helper->updateProduct($createdProduct, 'fabulous', 'even more fabulous');
        $this->assertEquals($createdProduct, $helper->getProduct($createdProduct->getProductId()));

        $helper->deleteProduct($createdProduct);
        $this->assertNotEquals($createdProduct, $helper->getProduct($createdProduct->getProductId()));


    }

    public function testUpdateProduct()
    {
    }

    public function TestDeleteProduct()
    {
    }
}
