<?php

class DetailPageTest extends \Codeception\Test\Unit
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
        $_GET = [
                'cl' => 'detail',
                'page'=>'list',
                'id'=>'5'
        ];
        $this->tester->arrange();
        $product = $this->tester->getSmartyParams('page');
        $secondProduct = $this->tester->exchangeDtoToSmartyParam($this->tester->getProduct(5), 'page');
        $this->assertEquals($product, $secondProduct);
    }
}
