<?php

declare(strict_types=1);
namespace App\Tests\integration\BackendControllerTest;

use UnitTester;
class ProductControllerBackendListTest extends \Codeception\Test\Unit
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
    public function testLoginIntoBackend(): void
    {
        $this->tester->arrange();
        $this->tester->setSession();
        $_SERVER['REQUEST_METHOD'] = '';
        $_GET = [
                'cl' => 'product',
                'page' => 'list',
                'admin' => 'true'
        ];
        $this->tester->setUpBootstrap();
        $productList = $this->tester->getSmartyParams()['productlist'];
        $secondProductList = $this->tester->getProductList();
        foreach ($secondProductList as $key => $product) {
            $this->assertEquals($product->getArticleNumber(), $productList[$key]->getArticleNumber());

        }

    }
}
