<?php
namespace App\Tests\integration\BackendControllerTest;



use UnitTester;

class AddProductTest extends \Codeception\Test\Unit
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
    public function testAddingAndDisplayingAProduct(): void
    {
        $this->tester->arrange();
        $this->tester->setSession();
        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_GET = [
                'cl' => 'product',
                'page' => 'list',
                'admin' => 'true',
        ];

        $_POST = [
                'save' => '',
                'newpagedescription' => 'A lovely shirt',
                'newpagename' => 'T-Shirt',
        ];
        $this->tester->setUpBootstrap();
        $this->tester->logIntoBackend();
        $productList = (array)$this->tester->getSmartyParams('productlist');
        $secondProductList = (array)$this->tester->exchangeDtoToSmartyParam(
            $this->tester->getProductList(),
            'productlist'
        );
        $this->assertNotEquals($productList, $secondProductList);
    }
}
