<?php

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
                'id'=>'314'
        ];
        $this->tester->setUpBootstrap();
        $product = $this->tester->getSmartyParams('page');
        $secondProduct = $this->tester->exchangeDtoToSmartyParam($this->tester->getProduct('314'), 'page');
       // $this->assertEquals($product, $secondProduct);
        self::assertSame();
    }
}
