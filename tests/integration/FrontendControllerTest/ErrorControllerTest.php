<?php


class ErrorControllerTest extends \Codeception\Test\Unit
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
    public function testErrorWithAdminEqualsTrue(): void
    {
        $this->tester->arrange();
        $this->tester->setSession();
        $_GET = [
                'cl' => 'home',
                'page' => 'list',
                'admin' => 'true'
        ];
        $this->tester->setUpBootstrap();
        $smartyParams = (string)$this->tester->getSmartyParams('error')['error'];
        $this->assertEquals($smartyParams, '404 Page not found.');
    }

    public function testErrorWithNoProductNumber():void
    {
        $this->tester->arrange();
        $this->tester->setSession();
        $_GET = [
                'cl' => 'detail',
                'page' => 'detail'
        ];
        $this->tester->setUpBootstrap();
        $smartyParams = (string)$this->tester->getSmartyParams('error')['error'];
        $this->assertEquals($smartyParams, '404 Page not found.');
    }
    public function testErrorWithNoneAvailableProductPage():void
    {
        $this->tester->arrange();
        $this->tester->setSession();

        $_GET = [
                'cl' => 'detail',
                'page' => 'detail',
                'id' => '0'
        ];
        $this->tester->setUpBootstrap();
        $smartyParams = (string)$this->tester->getSmartyParams('error')['error'];
        $this->assertEquals($smartyParams, '404 Page not found.');
    }
}
