<?php

/**
 * @group Page
 */

class DetailPageControllerTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester $tester
     */
    protected UnitTester $tester;

    protected function _before(): void
    {
    }

    protected function _after()
    {
    }

    // tests
    public function testProductDetailPageAndProductAvailability(): void
    {
        $this->tester->arrange();
        $this->tester->setSession();
        $_GET = [
                'cl' => 'detail',
                'id'=>'Unit-15'
        ];
        $this->tester->setUpBootstrap();
        $product = $this->tester->getSmartyParams();
        $secondProduct = $this->tester->getProduct('Unit-15');
        $productDto = $product['page'];
        $this->assertEquals($productDto->getArticleNumber(), $secondProduct->getArticleNumber());


    }
}
