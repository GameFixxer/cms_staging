<?php



class EditProductTest extends \Codeception\Test\Unit
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
        parent::_after();
        unset($_SERVER['REQUEST_METHOD']);
    }

    // tests
    public function testEditingAndDisplayingAProduct(): void
    {
        $this->tester->arrange();
        $this->tester->setSession();

        $_SERVER['REQUEST_METHOD'] = '';
        $_GET = [
            'cl' => 'product',
            'page' => 'list',
            'admin' => 'true',
        ];
        $this->tester->setUpBootstrap();
        $this->tester->logIntoBackend();
        $productList = (array)$this->tester->getSmartyParams('productlist');
        $tmpProductList = (array)$this->tester->getProductList();
        $singleProduct = (array)$this->tester->exchangeDtoToSmartyParam(end($tmpProductList), 'product');
        $id = end($tmpProductList)->getProductId();

        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_GET = [
                'cl' => 'product',
                'page' => 'list',
                'admin' => 'true',
        ];
        $_POST = [
            'save' => ''.$id,
            'newpagedescription' => 'A plain shirt',
            'newpagename' => 'T-Shirt',
    ];
        $this->tester->arrange();
        $this->tester->logIntoBackend();
        //$productList = (array)$this->tester->getSmartyParams('productlist');
        $secondProductList = (array)$this->tester->exchangeDtoToSmartyParam(
            $this->tester->getProductList(),
            'productlist'
        );
        // Is Product at List changed?
        $this->assertEquals($productList, $secondProductList);
        //

        $_SERVER['REQUEST_METHOD'] = '';
        $_GET = [
                'cl' => 'product',
                'page' => 'detail',
                'id' => ''.$id,
                'admin' => 'true',
        ];
        $this->tester->arrange();
        $this->tester->logIntoBackend();
        $detailProduct = (array)$this->tester->exchangeDtoToSmartyParam($this->tester->getProduct($id), 'product');
        //Is product at Detail Page changed?
        $this->assertEquals($singleProduct, $detailProduct);
    }
}
