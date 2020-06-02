<?php

class HomeControllerTest extends \Codeception\Test\Unit
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
    public function testHomepage(): void
    {
        $_GET = [
                'cl' => 'home',
                'page'=>'list'
        ];
        $this->tester->arrange();
        $smartyParams = (string)$this->tester->getSmartyParams('home');
        $this->assertEquals($smartyParams, 'There is no place like 127.0.0.1');
    }
}
