<?php




class LogoutFromBackendTest extends \Codeception\Test\Unit
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
            'cl' => 'dashboard',
            'page' => 'list',
            'admin' => 'true',
        ];

        $_SERVER['REQUEST_METHOD'] = 'POST';
        $_POST = ["logout"=>''];

        $this->tester->setUpBootstrap();


        codecept_debug($_POST);
        $this->assertFalse((bool)$_SESSION['loggedin']);

    }
}