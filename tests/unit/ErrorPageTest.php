<?php


class ErrorPageTest extends \Codeception\Test\Unit
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
        $_GET = [
                'cl' => 'home',
                'page' => 'list',
                'admin' => 'true'
        ];
        $this->tester->arrange();
        $smartyParams = (string)$this->tester->getSmartyParams('error');
        $this->assertEquals($smartyParams, '404 Page not found.');
    }

    public function testErrorWithNoProductNumber():void
    {
        $_GET = [
                'cl' => 'detail',
                'page' => 'detail'
        ];
        $this->tester->arrange();
        $smartyParams = (string)$this->tester->getSmartyParams('error');
        $this->assertEquals($smartyParams, '404 Page not found.');
    }
    public function testErrorWithNoneAvailableProductPage():void
    {
        $_GET = [
                'cl' => 'detail',
                'page' => 'detail',
                'id' => '0'
        ];
        $this->tester->arrange();
        $smartyParams = (string)$this->tester->getSmartyParams('error');
        $this->assertEquals($smartyParams, '404 Page not found.');
    }
}
