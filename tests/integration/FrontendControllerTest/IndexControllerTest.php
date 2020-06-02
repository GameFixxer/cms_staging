<?php


class IndexControllerTest extends \Codeception\Test\Unit
{
    /**
     * @var \UnitTester $tester
     */
    protected UnitTester $tester;

    protected function _before()
    {
    }

    protected function _after()
    {
    }

    // tests

    public function testDoesListHasAllProducts(): void
    {
        $_GET = [
                'cl' => 'list',
                'page'=>'list'
        ];
        $this->tester->arrange();
        $productList = $this->tester->getSmartyParams('productlist');
        $secondProductList = $this->tester->exchangeDtoToSmartyParam($this->tester->getProductList(), 'productlist');
        $this->assertEquals($productList, $secondProductList);

    }
}
