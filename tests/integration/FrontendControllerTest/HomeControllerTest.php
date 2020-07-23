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
        $this->tester->arrange();
        $this->tester->setSession();
        $_GET = [
                'cl' => 'home',
                'page'=>'list'
        ];
        $this->tester->setUpBootstrap();
        $smartyParams = (string)$this->tester->getSmartyParams()['home'];
        $this->assertEquals($smartyParams, 'There is no place like 127.0.0.1');
    }
}
