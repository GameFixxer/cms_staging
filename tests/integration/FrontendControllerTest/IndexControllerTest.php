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
        $this->tester->arrange();
        $this->tester->setSession();

        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_GET = [
            'cl' => 'list',
            'page'=>'list'
        ];
        $this->tester->setUpBootstrap();
        $productList = $this->tester->getSmartyParams('productlist');
        $secondProductList = $this->tester->exchangeDtoToSmartyParam($this->tester->getProductList(), 'productlist');
        $this->assertEquals($productList, $secondProductList);

    }
}
