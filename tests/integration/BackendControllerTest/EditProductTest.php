<?php
declare(strict_types=1);
namespace App\Tests\integration\BackendControllerTest;

use UnitTester;

/**
 * @group Page
 */

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
        $tmpProductList = (array)$this->tester->getProductList();
        $id = end($tmpProductList)->getArticleNumber();

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
        $_SERVER['REQUEST_METHOD'] = '';
        $_GET = [
                'cl' => 'product',
                'page' => 'detail',
                'id' => ''.$id,
                'admin' => 'true',
        ];
        $detailProduct = $this->tester->getProduct($id);
        //Is product at Detail Page changed?
        $this->assertEquals($id, $detailProduct->getArticleNumber());
        $this->assertEquals('T-Shirt', $detailProduct->getName());
        $this->assertEquals('A plain shirt', $detailProduct->getDescription());
    }
}
