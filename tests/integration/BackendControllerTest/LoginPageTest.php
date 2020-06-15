<?php


class LoginPageTest extends \Codeception\Test\Unit
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
    public function testLoginPage(): void
    {
        $this->tester->arrange();
        $_SERVER['REQUEST_METHOD'] = '';
        $_GET = [
                'cl' => 'login',
                'admin'=>'true'
        ];
        $this->tester->setUpBootstrap();
        $smartyParams = (string)$this->tester->getSmartyParams('login');
        $this->assertEquals($smartyParams, 'LOGIN AREA');
    }
}
